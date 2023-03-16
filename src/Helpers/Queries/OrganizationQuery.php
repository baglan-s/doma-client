<?php

namespace BaglanS\Doma\Helpers\Queries;

class OrganizationQuery
{
    public static function getAllOrganizationsQuery()
    {
        return <<<'GRAPHQL'
            query ($where: OrganizationWhereInput) {
                allOrganizations (where: $where) {
                    id
                    name
                    tin
                    description
                    createdAt
                    updatedAt
                }
            }
        GRAPHQL;
    }
}