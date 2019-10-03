<?php

namespace App\Traits;

use App\Enums\VariableType;
use App\Models\Variable;

trait Parameters
{
    public function parameters()
    {
        return $this->morphMany(Variable::class, 'entity')
            ->where('for_enum', VariableType::PARAMETER);
    }

    public function renderParameters()
    {
        $parameters = [];
        foreach ($this->parameters as $parameter) {
            $str = $parameter->type;
            $str .= " $parameter->name";
            if ($parameter->optional) {
                $str = "[{$str}]";
            }
            $parameters[] = trim($str);
        }
        $parameters = implode(', ', $parameters);
        return $parameters ? "({$parameters})" : null;
    }
}
