<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Models\Model;
use BaglanS\Doma\Helpers\Queries\UserQuery;
use BaglanS\Doma\Helpers\Mutations\UserMutation;

class User extends Model
{
    public function getUser($userId)
    {
        return $this->getUsers(['id' => $userId]);
    }

    public function getUsers(array $filter = [])
    {
        $response = $this->sendQuery(UserQuery::allUsersQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getResidents(array $filter = [])
    {
        $response = $this->sendQuery(UserQuery::allResidentsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function authenticateUserWithEmailAndPassword(string $email, string $password)
    {
        $response = $this->sendQuery(UserMutation::authenticateUserWithEmailAndPassword(), [
            'email' => $email, 'password' => $password
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
