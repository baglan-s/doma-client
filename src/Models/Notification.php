<?php

namespace BaglanS\Doma\Models;

use BaglanS\Doma\Helpers\Mutations\NotificationMutation;

class Notification extends Model
{
    public function sendB2CAppPushMessage(array $data = [])
    {
        $response = $this->sendQuery(NotificationMutation::sendB2CAppPushMessage(), $data);

        return json_decode($response->getBody()->getContents(), true);
    }
}
