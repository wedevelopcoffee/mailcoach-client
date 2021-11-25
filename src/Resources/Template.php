<?php

namespace WeDevelopCoffee\MailcoachClient\Resources;

class Template extends Resource
{
    /**
     * Example: 1
     * @var int
     */
    public $id;

    /**
     * Example: Example Template
     * @var string
     */
    public $name;

    /**
     * Example: <strong>This is an example template in HTML.</strong>
     * @var string
     */
    public $html;

    /**
     * Example:
     * @var NULL
     */
    public $structured_html;

    /**
     * Example: 2021-11-18T19:47:25.000000Z
     * @var string
     */
    public $created_at;

    /**
     * Example: 2021-11-18T19:47:41.000000Z
     * @var string
     */
    public $updated_at;
}
