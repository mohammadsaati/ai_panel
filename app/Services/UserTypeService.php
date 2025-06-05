<?php

namespace App\Services;

use App\Models\UserType;
use App\Services\Service;

 class UserTypeService extends Service
{

 	public function model()
	{
       $this->model = UserType::class;
	}

    public function create(array $data): UserType
    {
        return UserType::create($data);
    }

    public function update(array $data, UserType $userType): UserType
    {
        $userType->update($data);

        return $userType;
    }

    public function delete(UserType $userType): bool
    {
        return $userType->delete();
    }
 }