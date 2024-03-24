<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Helpers\Queries\MeterQuery;
use BaglanS\Doma\Helpers\Mutations\MeterMutation;

class Meter extends Model
{
    public function getMeters(array $filter = [])
    {
        $response = $this->sendQuery(MeterQuery::allMetersQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
    
    public function updateMeter(array $data = [])
    {
        $response = $this->sendQuery(MeterMutation::updateMeter(), $data);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function createMeter(array $data = [])
    {
        $response = $this->sendQuery(MeterMutation::createMeter(), $data);

        return json_decode($response->getBody()->getContents(), true);
    }
}
