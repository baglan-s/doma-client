<?php

namespace BaglanS\Doma\Helpers\Mutations;

class UserMutation
{
    public static function authenticateUserWithEmailAndPassword()
    {
        return <<<'GRAPHQL'
            mutation ($email: String, $password: String) {
                authenticateUserWithPassword(email: $email, password: $password) {
                    token
                    item {
                        id
                        name
                        type
                    }
                }
            }
        GRAPHQL;
    }
}
