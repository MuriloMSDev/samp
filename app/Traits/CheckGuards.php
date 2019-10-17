<?php

namespace App\Traits;

trait CheckGuards
{
    public function deleteSession()
    {
        $deleteSession = true;
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check()) {
                $deleteSession = false;
                continue;
            }
        }

        if ($deleteSession) {
            request()->session()->invalidate();
        }
    }
}
