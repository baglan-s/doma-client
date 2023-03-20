<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Models\Model;
use BaglanS\Doma\Helpers\Queries\OrganizationQuery;

class Organization extends Model
{
    public function getOrganization($organizationId)
    {
        return $this->getOrganizations(['id' => $organizationId]);
    }

    public function getOrganizations(array $filter = [])
    {
        $response = $this->sendQuery(OrganizationQuery::getAllOrganizationsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getContacts(array $filter = [])
    {
        $response = $this->sendQuery(OrganizationQuery::getAllContactsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
}
