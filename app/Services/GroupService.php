<?php

namespace App\Services;

use App\DataTransferObjects\GroupDTO;
use App\Http\Requests\GroupRequest;
use App\Models\Group;

class GroupService
{
    public function store(GroupDTO $groupDTO): Group
    {
        $group = Group::create([
            'name' => $groupDTO->name,
            'description' => $groupDTO->description,
            'creator_id' => $groupDTO->creator_id,
        ]);
        $group->users()->attach($groupDTO->creator_id);

        return $group;
    }

    public function update(Group $group, GroupDTO $groupDTO): Group
    {
        $group->update([
            'name' => $groupDTO->name,
            'description' => $groupDTO->description,
            'creator_id' => $groupDTO->creator_id,
        ]);
        return $group;
    }
}
