<?php

namespace BaglanS\Doma\Helpers\Queries;

class MeterReadingsQuery
{
    public static function getAllMeterReadingsQuery()
    {
        return <<<'GRAPHQL'
            query ($where: OrganizationWhereInput) {
                allMeterReadings (where: $where) {
                    id
                    date
                    value1
                    value2
                    value3
                    value4
                    source {
                      nameNonLocalized
                    }
                    meter {
                      id
                    }
                }
            }
        GRAPHQL;
    }
}
