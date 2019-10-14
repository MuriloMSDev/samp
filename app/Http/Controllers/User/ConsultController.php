<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    /**
     * LanguageTool interface.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function languageTool(Request $request)
    {
        return Tool::find($request->tool ?? $request->language)->languages
            ->map(function ($item) {
                return [
                    'id' => $item->pivot->id,
                    'text' => $item->name
                ];
            })
            ->toJson();
    }
}
