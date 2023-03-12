<?php

namespace App\Factories;

use Illuminate\Http\Request;

abstract class DTOFactory
{
    public static function fromRequest(Request $request)
    {
        return static::fromArray($request->validated());
    }

    abstract public static function fromArray(array $data);
}
