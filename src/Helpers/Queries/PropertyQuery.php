<?php

namespace BaglanS\Doma\Helpers\Queries;

class PropertyQuery
{
    public static function allPropertiesQuery()
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
                    addressMeta {
                        data {
                            fias_id
                            kladr_id
                            country
                            city
                            region
                            street
                        }
                    }
                    organization {
                        id
                        name
                        tin
                        description
                        createdAt
                        updatedAt
                    }
                    map {
                        sections {
                            id
                            type
                            index
                            name
                            floors {
                                id
                                type
                                name
                                units {
                                    id
                                    type
                                    name
                                    label
                                    unitType
                                }
                            }
                        }
                    }
                }
            }
        GRAPHQL;

    }
}