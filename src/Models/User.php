<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Models\Model;
use BaglanS\Doma\Helpers\GraphqlHelper;

class User extends Model
{
    public function getUser($userId)
    {
        return $this->getUsers(['id' => $userId]);
    }

    public function getUsers(array $filter = [])
    {
        $response = $this->sendQuery(GraphQLHelper::getAllUsersQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
}