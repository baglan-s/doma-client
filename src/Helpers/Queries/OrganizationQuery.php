<?php

namespace BaglanS\Doma\Helpers\Queries;

class OrganizationQuery
{
    public static function allOrganizationsQuery()
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

    public static function allContactsQuery()
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
