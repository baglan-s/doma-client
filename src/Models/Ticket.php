<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Helpers\Mutations\TicketMutation;

class Ticket extends Model
{
    public function createTicket(array $filter = [])
    {
        $response = $this->sendQuery(TicketMutation::createTicket(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
}
