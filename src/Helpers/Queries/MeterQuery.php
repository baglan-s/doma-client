<?php

namespace BaglanS\Doma\Helpers\Queries;

class MeterQuery
{
    public static function getAllMetersQuery()
    {
        return <<<'GRAPHQL'
            query ($where: OrganizationWhereInput) {
                allMeters (where: $where) {
                    id
                    property {
                        address
                    }
                    unitName
                    unitType
                    resource {
                      id
                      nameNonLocalized
                    }
                    numberOfTariffs
                    place
                }
            }
        GRAPHQL;
    }
}
