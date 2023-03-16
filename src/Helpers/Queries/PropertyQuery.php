<?php

namespace BaglanS\Doma\Helpers\Queries;

class PropertyQuery
{
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
                    updatedAt
                    ticketsInWork
                    ticketsClosed
                    ticketsDeferred
                    isApproved
                    yearOfConstruction
                    area
                    createdAt
                    updatedAt
                    organization {
                        id
                        name
                        tin
                        description
                        createdAt
                        updatedAt
                    }
                }
            }
        GRAPHQL;

    }
}