<?php

namespace BaglanS\Doma\Helpers\Mutations;

class AppMutation
{
    public static function createB2CAppProperty()
    {
        return <<<'GRAPHQL'
            mutation ($data: B2CAppPropertyCreateInput!) {
                createB2CAppProperty(data: $data) {
                    id
                    address
                    app {
                        id
                        name
                    }
                }
            }
        GRAPHQL;
    }

    public static function updateB2CAppProperty()
    {
        return <<<'GRAPHQL'
            mutation ($id: ID!, $data: B2CAppPropertyUpdateInput!) {
                updateB2CAppProperty(id: $id, data: $data) {
                    id
                    address
                    app {
                        id
                        name
                    }
                }
            }
        GRAPHQL;
    }

    public static function deleteB2CAppProperty()
    {
        return <<<'GRAPHQL'
            mutation ($id: ID!) {
                deleteB2CAppProperty(id: $id) {
                    id
                }
            }
        GRAPHQL;
    }
}
