<?php

namespace App\DataTransferObjects;

use App\Http\Requests\GroupRequest;

readonly class GroupDTO
{

    public function __construct(
        public string $name,
        public string $description,
        public int    $creator_id
    )
    {

    }
}
