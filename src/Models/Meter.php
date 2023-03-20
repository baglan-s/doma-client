<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Helpers\Queries\MeterQuery;

class Meter extends Model
{
    public function getMeters(array $filter = [])
    {
        $response = $this->sendQuery(MeterQuery::getAllMetersQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
}
