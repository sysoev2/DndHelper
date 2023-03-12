<?php

namespace App\Factories;

use App\DataTransferObjects\GroupDTO;
use Illuminate\Http\Request;
use ReflectionClass;
use ReflectionProperty;

class GroupDTOFactory extends DTOFactory
{
    public static function fromRequest(Request $request): GroupDTO
    {
        return self::fromArray(['creator_id' => auth()->id(), ...$request->validated()]);
    }

    public static function fromArray(array $data): GroupDTO
    {
        $reflection = new ReflectionClass(GroupDTO::class);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
        $DTOProperties = [];
        foreach ($properties as $property) {
            $DTOProperties[$property->name] = $data[$property->name];
        }
        return new GroupDTO(...$DTOProperties);
    }
}
