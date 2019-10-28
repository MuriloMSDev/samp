<?php

namespace App\Traits;

trait Views
{
    public function increaseViews()
    {
        $this->update([
            'views' => $this->views+1
        ]);
    }
}
