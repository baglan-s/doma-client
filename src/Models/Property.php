<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Models\Model;
use BaglanS\Doma\Helpers\Queries\PropertyQuery;
use BaglanS\Doma\Helpers\Queries\AppQuery;
use BaglanS\Doma\Helpers\Mutations\AppMutation;

class Property extends Model
{
    public function getProperty($propertyId)
    {
        return $this->getProperties([
            'where' => [
                'id' => $propertyId
            ]
        ]);
    }

    public function getProperties(array $filter = [])
    {
        $response = $this->sendQuery(PropertyQuery::allPropertiesQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getB2CAppProperties(array $filter = [])
    {
        $response = $this->sendQuery(AppQuery::allB2CAppPropertiesQuery(), $filter);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateB2CAppProperty(array $data)
    {
        $response = $this->sendQuery(AppMutation::updateB2CAppProperty(), $data);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function createB2CAppProperty(array $data)
    {
        $response = $this->sendQuery(AppMutation::createB2CAppProperty(), $data);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteB2CAppProperty(string $id)
    {
        $response = $this->sendQuery(AppMutation::deleteB2CAppProperty(), ['id' => $id]);

        return json_decode($response->getBody()->getContents(), true);
    }
}