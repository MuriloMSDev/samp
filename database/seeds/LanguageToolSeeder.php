<?php

use App\Adapters\Tools\ApiDocAdapter;
use App\Adapters\Tools\DocumentationJsAdapter;
use App\Models\Language;
use App\Models\Tool;
use Illuminate\Database\Seeder;

class LanguageToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentationJs = Tool::firstOrCreate([
            'name' => 'DocumentationJs',
            'adapter' => DocumentationJsAdapter::class,
        ])->id;

        $apiDoc = Tool::firstOrCreate([
            'name' => 'apiDoc',
            'adapter' => ApiDocAdapter::class,
        ])->id;

        $this->createLanguages(['JavaScript'], [$documentationJs, $apiDoc]);

        $this->createLanguages([
            'PHP',
            'C#',
            'Java',
            'Go',
            'CoffeeScript',
            'Ruby',
        ], [$apiDoc]);
    }

    private function createLanguages($languages, $tools)
    {
        foreach ($languages as $language) {
            Language::firstOrCreate(['name' => $language])
                ->tools()->sync($tools);
        }
    }
}
