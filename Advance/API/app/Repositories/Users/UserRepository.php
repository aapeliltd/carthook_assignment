<?php

namespace App\Repositories\Users;

use App\Model\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class UserRepository implements UserRepositoryInterface
{

    public $response;


    function all()
    {
        //get all users from cache.
        return Cache::remember('users', $minutes = '60', function () {
            // if there none in cache, get them from database
            $users =  User::orderby('id', 'DESC')->limit(10)->get();
            if (count($users) <= 0) {
                // that is, there is nothing in cache and in database, therefore fetch from open API
                $url = env('BASE_URL') . '/users';
                $this->response = Http::get($url);
                if ($this->response->successful()) {
                    //save data to database
                    $data = $this->response->json();
                    foreach ($data as $item) {
                        $this->createUser($item);
                    }
                } else {
                }

                // return the users after created in database
                return User::all();
            } else {
                return $users;
            }
        });
    }

    public function find($id)
    {
        return Cache::remember("users.{$id}", $minutes = '60', function () use ($id) {
            $user =  User::find($id);
            if ($user == null) {
                // no user in database, get it from open api.
                $url = env('BASE_URL') . '/users/' . $id;
                $data = $this->response = Http::get($url);
                if ($this->response->successful()) {
                    $this->createUser($data);
                }
            } else {
                return $user;
            }
        });
    }

    public function findUserEmail($email)
    {
        return Cache::remember("users.{$email}", $minutes = '60', function () use ($email) {
            return User::where('email', $email)->first();
        });
    }

    protected function createUser($data)
    {
        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email']
        ]);
    }
}
