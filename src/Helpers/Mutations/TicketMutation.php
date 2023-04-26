<?php

namespace BaglanS\Doma\Helpers\Mutations;

class TicketMutation
{
    public static function createTicket()
    {
        return <<<'GRAPHQL'
            mutation createTicket(
               $data: TicketCreateInput
            ) {
                createTicket(data: $data) {
                    id
                }
            }
        GRAPHQL;
    }
}
