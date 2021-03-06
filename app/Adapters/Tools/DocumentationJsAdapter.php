<?php

namespace App\Adapters\Tools;

use App\Enums\FunctionType;
use App\Enums\ProjectType;
use App\Enums\VariableType;
use App\Interfaces\ToolInterface;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DocumentationJsAdapter implements ToolInterface
{
    public static function build($data)
    {
        DB::beginTransaction();

        try {
            $documentation = json_decode(file_get_contents($data['documentation']), true);

            $project = Project::create(array_merge($data, [
                'type_enum' => ProjectType::NON_RESTFUL,
                'user_id' => user()->id,
            ]));

            foreach ($documentation as $class) {
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

        $tags = collect($data['tags'])->groupBy('title');

        self::examples($tags->get('example'), $class);

        self::parameters($tags->get('param'), $class);

        self::functions($data['members'], FunctionType::INSTANCE, $class);

        self::functions($data['members'], FunctionType::STATIC, $class);
    }

    private static function functions($data, $type, $class)
    {
        foreach ($data[$type] as $item) {
            $function = $class->functions()->create([
                'name' => $item['name'],
                'description' => $item['description'],
                'type_enum' => $type
            ]);

            $tags = collect($item['tags'])->groupBy('title');

            self::examples($tags->get('example'), $function);

            self::parameters($tags->get('param'), $function);

            self::return(optional($tags->get('returns'))->first(), $function);
        }
    }

    private static function examples($examples, $entity)
    {
        foreach ($examples??[] as $item) {
            $entity->examples()->create(['content' => $item['description']]);
        }
    }

    private static function parameters($params, $entity)
    {
        if (!$params) {
            return;
        }

        $parameters = $entity->parameters()->create([
            'for_enum' => VariableType::PARAMETER
        ]);

        foreach ($params as $item) {
            $parameters->variables()->create([
                'name' => $item['name'],
                'description' => $item['description'],
                'type' => (
                    $item['type']['name'] ??
                    $item['type']['expression']['name'] ??
                    null
                ),
                'optional' => (
                    ($item['type']['type'] ?? null) == 'OptionalType'
                )
            ]);
        }
    }

    private static function return($data, $entity)
    {
        if (!$data) {
            return;
        }

        $return = $entity->returns()->create([
            'for_enum' => VariableType::RETURN,
        ]);

        $return->variables()->create([
            'name' => (
                $data['type']['name'] ??
                $data['type']['type'] ??
                'Any'
            ),
            'description' => $data['description'],
            'type' => (
                $data['type']['name'] ??
                $data['type']['type'] ??
                'Any'
            )
        ]);
    }
}
