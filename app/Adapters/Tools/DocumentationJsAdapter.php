<?php

namespace App\Adapters\Tools;

use App\Interfaces\ToolInterface;

class DocumentationJsAdapter implements ToolInterface
{
    public function name()
    {
        return 'DocumentationJs';
    }
}
