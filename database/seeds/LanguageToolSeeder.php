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

        $this->createLanguages(['JavaScript' => 'devicon-javascript-plain'], [$documentationJs, $apiDoc]);

        $this->createLanguages([
            'PHP' => 'devicon-php-plain',
            'C#' => 'devicon-csharp-plain',
            'Java' => 'devicon-java-plain',
            'Go' => 'devicon-go-plain',
            'CoffeeScript' => 'devicon-coffeescript-original',
            'Ruby' => 'devicon-ruby-plain',
        ], [$apiDoc]);
    }

    private function createLanguages($languages, $tools)
    {
        foreach ($languages as $language => $icon) {
            Language::firstOrCreate(
                ['name' => $language],
                compact('icon')
            )->tools()->sync($tools);
        }
    }
}
