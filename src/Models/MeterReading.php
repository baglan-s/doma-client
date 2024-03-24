<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Helpers\Queries\MeterReadingQuery;
use BaglanS\Doma\Helpers\Mutations\MeterReadingMutation;

class MeterReading extends Model
{
    public function getMeterReadings(array $filter = [])
    {
        $response = $this->sendQuery(MeterReadingQuery::allMeterReadingsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function createMeterReading(array $data)
    {
        $response = $this->sendQuery(MeterReadingMutation::createMeterReading(), $data);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateMeterReading(array $data)
    {
        $response = $this->sendQuery(MeterReadingMutation::updateMeterReading(), $data);

        return json_decode($response->getBody()->getContents(), true);
    }
}
