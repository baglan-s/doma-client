<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Models\Model;
use BaglanS\Doma\Helpers\Queries\PropertyQuery;

class Property extends Model
{
    public function getProperty($propertyId)
    {
        return $this->getProperties([
            'where' => [
                ['id' => $propertyId]
            ]
        ]);
    }

    public function getProperties(array $filter = [])
    {
        $response = $this->sendQuery(PropertyQuery::allPropertiesQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }
}