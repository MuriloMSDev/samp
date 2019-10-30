<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Transliterator;

class Strings
{
    public static function removeAccents($str)
    {
        return Transliterator::createFromRules(':: NFD; :: [:Nonspacing Mark:] Remove; :: NFC;', Transliterator::FORWARD)->transliterate($str);
    }
}
