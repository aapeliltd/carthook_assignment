<?php

namespace App\Repositories\Users;

interface UserRepositoryInterface
{


    public function all();
    public function find($id);
    public function findUserEmail($email);
}
