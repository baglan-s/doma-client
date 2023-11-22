<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Helpers\Mutations\TicketMutation;
use BaglanS\Doma\Helpers\Queries\TicketQuery;

class Ticket extends Model
{
    public function createTicket(array $filter = [])
    {
        $response = $this->sendQuery(TicketMutation::createTicket(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getTicketResources(array $filter = [])
    {
        $response = $this->sendQuery(TicketQuery::allTicketSourcesQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
}
