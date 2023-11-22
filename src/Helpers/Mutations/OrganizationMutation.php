<?php

namespace BaglanS\Doma\Helpers\Mutations;

class OrganizationMutation
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

    public static function updateContact()
    {
        return <<<'GRAPHQL'
            mutation updateContact ($id: ID!, $data: ContactUpdateInput!) {
                updateContact (id: $id, data: $data) {
                    id
                }
            }
        GRAPHQL;
    }
}
