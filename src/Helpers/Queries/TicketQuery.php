<?php

namespace BaglanS\Doma\Helpers\Queries;

class TicketQuery
{
    public static function allTicketSourcesQuery()
    {
        return <<<'GRAPHQL'
            query ($where: TicketSourceWhereInput) {
                allTicketSources (where: $where) {
                    id
                    organization {
                        id
                        name
                        tin
                    }
                    type
                    name
                }
            }
        GRAPHQL;
    }
}
