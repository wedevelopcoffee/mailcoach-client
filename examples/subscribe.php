<?php

use WeDevelopCoffee\MailcoachClient\Exceptions\MailcoachResourceExistsException;
use WeDevelopCoffee\MailcoachClient\Mailcoach;
use WeDevelopCoffee\MailcoachClient\Resources\Subscriber;

require('base.php');

// Boot Mailcoach
$mailcoach = new Mailcoach($apiUrl, $key);

// Create a resource.
$subscriber = new Subscriber();
$subscriber->first_name = 'Daniel';
$subscriber->last_name = 'Koop';
$subscriber->email = 'mail+288@danielkoop.me';

// Call the subscriber method and provide the mailing list id.
try {
    $result = $mailcoach->subscriber(1)
        // Pass on the resource and let's create the subscriber.
        ->create($subscriber);

    // Let's dump the result.
    echo '<pre>';print_r($result);exit;
} catch ( MailcoachResourceExistsException $e)
{
    // The user exists already.
    echo "User was already subscribed.";
}

