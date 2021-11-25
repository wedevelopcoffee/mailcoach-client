<?php

namespace WeDevelopCoffee\MailcoachClient\Resources;

class Subscriber extends Resource
{
    /**
     * Example: 50
     * @var int
     */
    public $id;

    /**
     * Example: 1
     * @var int
     */
    public $email_list_id;

    /**
     * Example: mail@gmail.com
     * @var string
     */
    public $email;

    /**
     * Example: Daniel
     * @var string
     */
    public $first_name;

    /**
     * Example: Koop
     * @var string
     */
    public $last_name;

    /**
     * Example: Array()
     * @var array
     */
    public $extra_attributes;

    /**
     * Example: Array()
     * @var array
     */
    public $tags;

    /**
     * Example: 9efc90b5-3d38-49e2-a0fb-58d67c70363a
     * @var string
     */
    public $uuid;

    /**
     * Example: 2021-11-18T16:57:55.000000Z
     * @var string
     */
    public $subscribed_at;

    /**
     * Example:
     * @var NULL
     */
    public $unsubscribed_at;

    /**
     * Example: 2021-11-18T16:57:55.000000Z
     * @var string
     */
    public $created_at;

    /**
     * Example: 2021-11-18T16:57:55.000000Z
     * @var string
     */
    public $updated_at;

    /**
     * @var array[]
     */
    public $ignore_post_fields = [
        'id',
        'email_list_id',
        'extra_attributes',
        'uuid',
        'subscribed_at',
        'unsubscribed_at',
        'created_at',
        'updated_at'];
}
