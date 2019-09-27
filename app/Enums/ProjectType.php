<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class ProjectType extends Enum implements LocalizedEnum
{
    const RESTFUL     = 'restful';
    const NON_RESTFUL = 'non_restful';
}
