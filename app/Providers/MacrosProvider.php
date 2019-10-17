<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class MacrosProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Delete the first record matching the attributes and create other if different.
         *
         * @param  array  $attributes
         * @param  array  $values
         * @return \Illuminate\Database\Eloquent\Model|static
         */
        Builder::macro('deleteAndCreateIfDifferent', function (array $attributes, array $values = []) {
            $exist = $this->newModelInstance()->where($attributes + $values)->exists();
            if (!is_null($instance = $this->newModelInstance()->where($attributes)->first())) {
                $instance->delete();
            }

            if ($exist) {
                return null;
            }

            return tap($this->newModelInstance($attributes + $values), function ($instance) {
                $instance->save();
            });
        });
    }
}
