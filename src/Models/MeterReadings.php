<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Helpers\Queries\MeterReadingsQuery;

class MeterReadings extends Model
{
    public function getMeterReadings(array $filter = [])
    {
        $response = $this->sendQuery(MeterReadingsQuery::getAllMeterReadingsQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
}
