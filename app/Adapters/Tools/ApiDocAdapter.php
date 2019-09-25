<?php

namespace App\Adapters\Tools;

use App\Interfaces\ToolInterface;

class ApiDocAdapter implements ToolInterface
{
    public function name()
    {
        return 'ApiDoc';
    }
}
