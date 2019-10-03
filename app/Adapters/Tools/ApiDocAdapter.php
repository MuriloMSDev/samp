<?php

namespace App\Adapters\Tools;

use App\Interfaces\ToolInterface;

class ApiDocAdapter implements ToolInterface
{
    public static function build($data)
    {
        return true;
    }
}
