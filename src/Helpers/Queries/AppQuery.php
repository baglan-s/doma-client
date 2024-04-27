<?php

namespace BaglanS\Doma\Helpers\Queries;

class AppQuery
{
    public static function allB2CAppPropertiesQuery()
    {
        return <<<'GRAPHQL'
            query ($where: B2CAppPropertyWhereInput) {
                allB2CAppProperties(where: $where) {
                    id
                    address
                    app {
                        id
                        name
                    }
                }
            }
        GRAPHQL;

    }
}