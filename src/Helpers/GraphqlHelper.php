<?php

namespace BaglanS\Doma\Helpers;

class GraphqlHelper
{
    public static function authenticatedUserQuery()
    {
        return <<<GRAPHQL
            query {
                authenticatedUser {
                    id 
                    name
                    type
                    phone
                    email
                    isAdmin
                }
            }
        GRAPHQL;
    }
}