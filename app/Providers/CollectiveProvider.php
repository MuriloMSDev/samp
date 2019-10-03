<?php

namespace App\Providers;

use Collective\Html\FormFacade;
use Illuminate\Support\ServiceProvider;

class CollectiveProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        FormFacade::macro('select2', function (
            $name,
            $list = [],
            $selected = null,
            array $selectAttributes = [],
            array $optionsAttributes = [],
            array $optgroupsAttributes = []
        ) {
            $this->type = 'select';

            $selectAttributes['class'] .= ' select2';

            $selected = $this->getValueAttribute($name, $selected);

            if ($selected && empty($list)) {
                $selectAttributes['default'] = $selected;
            }

            $selectAttributes['id'] = $this->getIdAttribute($name, $selectAttributes);

            if (! isset($selectAttributes['name'])) {
                $selectAttributes['name'] = $name;
            }

            $html = [];

            foreach ($list as $value => $display) {
                $optionAttributes = $optionsAttributes[$value] ?? [];
                $optgroupAttributes = $optgroupsAttributes[$value] ?? [];
                $html[] = $this->getSelectOption($display, $value, $selected, $optionAttributes, $optgroupAttributes);
            }

            $selectAttributes = $this->html->attributes($selectAttributes);

            $list = implode('', $html);

            return $this->toHtmlString("<select{$selectAttributes}>{$list}</select>");
        });
    }
}
