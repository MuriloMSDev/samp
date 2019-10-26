<?php

namespace App\Adapters\Tools;

use App\Enums\ProjectType;
use App\Enums\VariableType;
use App\Interfaces\ToolInterface;
use App\Models\Project;
use App\Models\VariableGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiDocAdapter implements ToolInterface
{
    public static function build($data)
    {
        DB::beginTransaction();

        try {
            $documentation = json_decode(file_get_contents($data['documentation']), true);

            $project = Project::create(array_merge($data, [
                'type_enum' => ProjectType::RESTFUL,
                'user_id' => user()->id,
            ]));

            $classes = collect($documentation)->groupBy('filename')->map(function ($item, $key) {
                return [
                    'name' => strtok(basename($key), '.'),
                    'description' => $item->first()['groupTitle'],
                    'functions' => $item
                ];
            })->toArray();

            foreach ($classes as $class) {
                self::class($class, $project);
            }

            DB::commit();

            return $project;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());

            return false;
        }
    }

    private static function class($data, $project)
    {
        $class = $project->classes()->create($data);

        self::functions($data['functions'], $class);
    }

    private static function functions($data, $class)
    {
        foreach ($data as $item) {
            $function = $class->functions()->create([
                'name' => $item['name'],
                'description' => $item['title'],
                'url' => $item['url'],
                'method' => $item['type'],
            ]);

            self::variable(
                $item['header']??null,
                VariableType::HEADER,
                $function
            );

            self::variable(
                $item['parameter']??null,
                VariableType::PARAMETER,
                $function
            );

            self::variable(
                $item['success']??null,
                VariableType::SUCCESS,
                $function
            );

            self::variable(
                $item['error']??null,
                VariableType::ERROR,
                $function
            );
        }
    }

    private static function variable($data, $type, $entity)
    {
        if (!$data) {
            return;
        }

        $group = new VariableGroup([
            'for_enum' => $type,
        ]);
        $group->entity()->associate($entity);
        $group->save();

        if (isset($data['fields'])) {
            $fields = collect($data['fields']);
            foreach ($fields->first() as $variable) {
                $group->variables()->create([
                    'name' => $variable['field'],
                    'description' => $variable['description'],
                    'type' => $variable['type'],
                    'optional' => $variable['optional'],
                    'default' => ($variable['defaultValue'] ?? null)
                ]);
            }
        }
        if (isset($data['examples'])) {
            $examples = collect($data['examples']);
            $example = $examples->first();
            $group->example()->create([
                'name' => $example['title'],
                'content' => $example['content']
            ]);
        }
    }
}
