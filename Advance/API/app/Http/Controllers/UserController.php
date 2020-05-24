<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Repositories\Users\UserRepositoryInterface;
use App\Traits\Paginate;
use Illuminate\Http\Response;



class UserController extends Controller
{
    use Paginate;

    protected $userInterface;

    public function __construct(UserRepositoryInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function index()
    {
        $users = UserResource::collection($this->userInterface->all());
        if ($users) {
            return response([
                'data' => $this->Paginate($users, 5),
                'message' => 'Success'
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => 'internal server error',

            ],  Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($user_id)
    {
        $user =  new UserResource($this->userInterface->find($user_id));
        if ($user) {
            return response([
                'data' => $user,
                'message' => 'Success'
            ], Response::HTTP_OK);
        } else {
            return response([
                'error' => 'internal server error',

            ],  Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
