<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\GroupDTO;
use App\Factories\GroupDTOFactory;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{

    public function __construct(
        protected GroupService $groupService
    )
    {

    }

    public function index()
    {
        $groups = Group::whereRelation('users', 'id', auth()->id())->get()->all();
        return view('groups.index', ['groups' => $groups]);
    }

    public function store(GroupRequest $request)
    {
        $this->groupService->store(GroupDTOFactory::fromRequest($request));

        return Redirect::route('group.index');
    }
}
