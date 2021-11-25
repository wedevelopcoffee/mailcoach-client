<?php

namespace WeDevelopCoffee\MailcoachClient\Resources;

class SubscriberImport extends Resource
{
    /**
     * Example: 1
     * @var int
     */
    public $id;

    /**
     * Example: 57431549-d791-4edf-b4f3-c34682f843af
     * @var string
     */
    public $uuid;

    /**
     * Example:
     * @var NULL
     */
    public $subscribers_csv;

    /**
     * Example: completed
     * @var string
     */
    public $status;

    /**
     * Example: 1
     * @var int
     */
    public $email_list_id;

    /**
     * Example:
     * @var bool
     */
    public $subscribe_unsubscribed;

    /**
     * Example:
     * @var bool
     */
    public $unsubscribe_others;

    /**
     * Example:
     * @var bool
     */
    public $replace_tags;

    /**
     * Example: 50
     * @var int
     */
    public $imported_subscribers_count;

    /**
     * Example: 0
     * @var int
     */
    public $error_count;
}
