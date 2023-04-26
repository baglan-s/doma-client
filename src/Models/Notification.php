<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Helpers\Mutations\NotificationMutation;

class Notification extends Model
{
    public function sendAppPushMessage(array $data = [])
    {
        $response = $this->sendQuery(NotificationMutation::sendAppPushMessage(), $data);

        return json_decode($response->getBody()->getContents(), true);
    }
}
