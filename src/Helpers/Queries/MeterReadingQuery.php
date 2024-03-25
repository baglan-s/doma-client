<?php

namespace BaglanS\Doma\Helpers\Queries;

class MeterReadingQuery
{
    public static function allMeterReadingsQuery()
    {
        return <<<'GRAPHQL'
            query ($where: MeterReadingWhereInput) {
                allMeterReadings (where: $where) {
                    id
                    date
                    value1
                    value2
                    value3
                    value4
                    source {
                      id
                      name
                    }
                    meter {
                      id
                    }
                }
            }
        GRAPHQL;
    }
}
