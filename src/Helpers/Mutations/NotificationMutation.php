<?php

namespace BaglanS\Doma\Helpers\Mutations;

class NotificationMutation
{
    public static function sendAppPushMessage()
    {
        return <<<'GRAPHQL'
            mutation sendAppPushMessage ($data: SendAppPushMessageInput!) {
                sendAppPushMessage (data: $data) {
                    id
                    status
                }
            }
        GRAPHQL;
    }
}
