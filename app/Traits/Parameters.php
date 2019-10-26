<?php

namespace App\Traits;

use App\Enums\VariableType;
use App\Models\VariableGroup;

trait Parameters
{
    public function parameters()
    {
        return $this->morphOne(VariableGroup::class, 'entity')
            ->where('for_enum', VariableType::PARAMETER);
    }

    public function renderParameters()
    {
        if (!$parameters = $this->parameters) {
            return null;
        }

        $params = [];
        foreach ($parameters->variables as $parameter) {
            $str = $parameter->type;
            $str .= " $parameter->name";
            if ($parameter->optional) {
                $str = "[{$str}]";
            }
            $params[] = trim($str);
        }
        $params = implode(', ', $params);
        return "({$params})";
    }
}
