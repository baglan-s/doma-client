<?php

namespace BaglanS\Doma\Helpers\Queries;

class MeterQuery
{
    public static function allMetersQuery()
    {
        return <<<'GRAPHQL'
            query ($where: MeterWhereInput) {
                allMeters (where: $where) {
                    id
                    property {
                        id
                        address
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
                    }
                    unitName
                    unitType
                    resource {
                      id
                      name
                    }
                    numberOfTariffs
                    place
                    accountNumber
                    number
                }
            }
        GRAPHQL;
    }
}
