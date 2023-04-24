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
        $response = $this->sendQuery(OrganizationQuery::allOrganizationsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getContacts(array $filter = [])
    {
        $response = $this->sendQuery(OrganizationQuery::allContactsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
    
    public function getOrganizationEmployees(array $filter = [])
    {
        $response = $this->sendQuery(OrganizationQuery::allOrganizationEmployeesQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
    
    public function getAllB2BApps(array $filter = [])
    {
        $response = $this->sendQuery(OrganizationQuery::allB2BAppsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getAllB2CApps(array $filter = [])
    {
        $response = $this->sendQuery(OrganizationQuery::allB2CAppsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
}
