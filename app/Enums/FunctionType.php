<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class FunctionType extends Enum implements LocalizedEnum
{
    const STATIC = 'static';
    const INSTANCE = 'instance';
}
