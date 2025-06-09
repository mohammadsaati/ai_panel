<?php

 namespace App\Services;

 use App\Models\User;
 use App\Services\Service;

 class UserService extends Service
{

 	public function model()
	{
        $this->model = User::class;
	}

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(array $data, User $user): User
    {
        $user->update($data);

        return $user;
    }

    
 }