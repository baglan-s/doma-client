<?php

namespace BaglanS\Doma\Helpers\Mutations;

class NotificationMutation
{
    public static function sendB2CAppPushMessage()
    {
        return <<<'GRAPHQL'
            mutation sendB2CAppPushMessage ($data: SendB2CAppPushMessageInput!) {
                sendB2CAppPushMessage (data: $data) {
                    id
                    status
                }
            }
        GRAPHQL;
    }
}
