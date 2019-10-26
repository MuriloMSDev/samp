<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class VariableType extends Enum
{
    const PARAMETER = 'parameter';
    const RETURN    = 'return';
    const SUCCESS   = 'success';
    const ERROR     = 'error';
    const HEADER    = 'header';
}
