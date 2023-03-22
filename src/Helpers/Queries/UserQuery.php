<?php

namespace BaglanS\Doma\Helpers\Queries;

class UserQuery
{
    public static function authenticatedUserQuery()
    {
        return <<<GRAPHQL
            query {
                authenticatedUser {
                    id
                    name
                    type
                    phone
                    email
                    isAdmin
                }
            }
        GRAPHQL;
    }

    public static function getAllUsersQuery()
    {
        return <<<'GRAPHQL'
            query ($where: UserWhereInput) {
                allUsers (where: $where) {
                    id
                    name
                    type
                    phone
                    email
                    isAdmin
                    createdAt
                    updatedAt
                }
            }
        GRAPHQL;
    }

    public static function allResidentsQuery()
    {
        return <<<'GRAPHQL'
            query ($where: ResidentWhereInput) {
                allResidents (where: $where) {
                    id
                    residentProperty {
                      name
                      address
                    }
                    unitName
                    unitType
                    address
                }
            }
        GRAPHQL;
    }
}
