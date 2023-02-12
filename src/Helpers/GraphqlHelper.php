<?php

namespace BaglanS\Doma\Helpers;

class GraphqlHelper
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

    public static function getAllPropertiesQuery()
    {
        return <<<'GRAPHQL'
            query ($where: PropertyWhereInput) {
                allProperties(where: $where) {
                    id
                    name
                    address
                    type
                    unitsCount
                    ticketsCount
                    updatedAt
                    ticketsInWork
                    ticketsClosed
                    ticketsDeferred
                    isApproved
                    yearOfConstruction
                    area
                    createdAt
                    updatedAt
                }
            }
        GRAPHQL;

    }
}