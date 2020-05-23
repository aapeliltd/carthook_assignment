<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Model\User;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Response;

class ApiUser
{
    public $id;
    public $name;
    public $username;
    public $email;
    public $href;
}

class UserController extends Controller
{
    public $message;
    public $status_code;
    public $response;
    public function index()
    {
        $this->response = Http::get(env('BASE_URL') . '/users');
        $users = [];
        if ($this->response->successful()) {
            $this->status_code = Response::HTTP_OK;
            $this->message = "Success";
            $data = $this->response->json();
            if (count($data) > 0) {
                foreach ($data as $item) {
                    $user = new ApiUser();
                    $user = $this->transformUser($item);
                    $users[] = $user;
                }
            }
        } else if ($this->response->failed() || $this->response->clientError()) { //400
            $this->badRequest();
        } else { //500
            $this->internalServerError();
        }
        return response([
            'data' => $users,
            'message' => $this->message,
        ], $this->status_code);
    }

    public function show($user)
    {
        $this->response = Http::get(env('BASE_URL') . '/users/' . $user);
         $user = new ApiUser();
        if ($this->response->successful()) {
            $this->status_code = Response::HTTP_OK;
            $this->message = "Success";
            $data = $this->response->json();
            $user = $this->transformUser($data);
        } else if ($this->response->failed() || $this->response->clientError()) { //400
            $this->badRequest();
        } else { //500
            $this->internalServerError();
        }
        return response([
            'data' => $user,
            'message' => $this->message,
        ], $this->status_code);

    }
    protected function badRequest()
    {
        $this->message = "Bad Request";
        $this->status_code = Response::HTTP_BAD_REQUEST;
    }
    protected function internalServerError()
    {
        $this->message = "Internal server error";
        $this->status_code = Response::HTTP_INTERNAL_SERVER_ERROR;
    }
    protected function transformUser($data) {
        $user = new ApiUser();
        $user->id = $data['id'];
        $user->name = $data['name'];
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->href = [
            'link' => route('users.show', $data['id'])
        ];
        return $user;
    }
}
