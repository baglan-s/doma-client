<?php

namespace BaglanS\Doma\Helpers\Queries;

class OrganizationEmployeesQuery
{
    public static function allOrganizationEmployeesQuery()
    {
        return <<<'GRAPHQL'
            query ($where: OrganizationEmployeeWhereInput) {
                allOrganizationEmployees (where: $where) {
                    id
                    name
                    __typename
                    user {
                      id
                      name
                      __typename
                    }
                    organization {
                      id
                      name
                      __typename
                    }
                    role {
                      id
                      name
                      __typename
                      canManageTickets
                      canManageRoles
                      canManageContacts
                      canManageOrganization
                      canManageProperties
                    }
                }
            }
        GRAPHQL;
    }
}
