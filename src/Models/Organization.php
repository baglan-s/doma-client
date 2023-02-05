<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Models\Model;
use BaglanS\Doma\Helpers\GraphqlHelper;

class Organization extends Model
{
    public function getOrganization($organizationId)
    {
        return $this->getOrganizations(['id' => $organizationId]);
    }

    public function getOrganizations(array $filter = [])
    {
        $response = $this->sendQuery(GraphQLHelper::getAllOrganizationsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
}