<?php

namespace BaglanS\Doma\Helpers\Mutations;

class MeterMutation
{
    public static function updateMeter()
    {
        return <<<'GRAPHQL'
            mutation updateMeter ($id: ID!, $data: MeterUpdateInput!) {
                updateMeter (id: $id, data: $data) {
                    id
                }
            }
        GRAPHQL;
    }
}
