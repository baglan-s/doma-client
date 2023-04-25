<?php

namespace BaglanS\Doma\Helpers\Mutations;

class TicketMutation
{
    public static function createTicket()
    {
        return <<<GRAPHQL
            mutation createTicket(
                $fingerprint: String!
                $organizationId: ID!
                $sourceId: ID!
                $propertyId: ID!
                $details: String
            ) {
                createTicket(
                    data: {
                        dv: 1
                        sender: { dv: 1, fingerprint: $fingerprint }
                        organization: { connect: { id: $organizationId } }
                        property: { connect: { id: $propertyId } }
                        source: { connect: { id: $sourceId } }
                        details: $details
                    }
                ) {
                    id
                    details
                    status {
                        name type __typename
                    }
                }
            }
        GRAPHQL;
    }
}
