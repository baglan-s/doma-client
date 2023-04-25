<?php

namespace BaglanS\Doma\Helpers\Mutations;

class MeterMutation
{
    public static function updateMeter()
    {
        return <<<GRAPHQL
            mutation updateMeter ($id: ID!, $data: MeterUpdateInput!) {
                obj: updateMeter (id: $id, data: $data) {
                    id
                }
            }
        GRAPHQL;
    }
}
