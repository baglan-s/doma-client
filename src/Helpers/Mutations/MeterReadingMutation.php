<?php

namespace BaglanS\Doma\Helpers\Mutations;

class MeterReadingMutation
{
    public static function updateMeterReading()
    {
        return <<<'GRAPHQL'
            mutation updateMeterReading ($id: ID!, $data: MeterReadingUpdateInput!) {
                updateMeterReading (id: $id, data: $data) {
                    id
                }
            }
        GRAPHQL;
    }

    public static function createMeterReading()
    {
        return <<<'GRAPHQL'
            mutation createMeterReading ($data: MeterReadingCreateInput!) {
                createMeterReading (data: $data) {
                    id
                }
            }
        GRAPHQL;
    }
}
