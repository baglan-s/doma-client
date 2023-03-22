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

    public static function getAllContactsQuery()
    {
        return <<<'GRAPHQL'
            query () {
                allContacts () {
                    id
                    name
                    phone
                    email
                    property {
                      id
                      address
                    }
                    unitName
                    unitType
                }
            }
        GRAPHQL;
    }
}
