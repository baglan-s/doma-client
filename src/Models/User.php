<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Models\Model;
use BaglanS\Doma\Helpers\Queries\UserQuery;

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
}
