<?php

namespace App\Helpers;

class Arrays
{
    public static function search($string, $array)
    {
        return array_filter($array, function ($value) use ($string) {
            $value = Strings::removeAccents($value);
            $search = Strings::removeAccents($string);
            return (strpos(strtolower($value), strtolower($search)) !== false);
        });
    }

    public static function toCollections($array)
    {
        return collect($array)->map(function ($child) {
            if (is_array($child)) {
                return self::toCollections($child);
            }
            return $child;
        });
    }
}
