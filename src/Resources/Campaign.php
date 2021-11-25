<?php

namespace WeDevelopCoffee\MailcoachClient\Resources;

class Campaign extends Resource
{
    /**
     * Example: 1
     * @var int
     */
    public $id;

    /**
     * Example: Test campaign for list 1
     * @var string
     */
    public $name;

    /**
     * Example: 3f981983-8289-4b46-b4d8-e78806b95126
     * @var string
     */
    public $uuid;

    /**
     * Example: 1
     * @var int
     */
    public $email_list_id;

    /**
     * Example: EmailList
     * @var WeDevelopCoffee\MailcoachClient\Resources\EmailList
     */
    public $email_list;

    /**
     * Example:
     * @var NULL
     */
    public $from_email;

    /**
     * Example: Test campaign for list 1
     * @var string
     */
    public $from_name;

    /**
     * Example: draft
     * @var string
     */
    public $status;

    /**
     * Example: <strong>This is some content</strong>
     * @var string
     */
    public $html;

    /**
     * Example:
     * @var NULL
     */
    public $structured_html;

    /**
     * Example:
     * @var NULL
     */
    public $email_html;

    /**
     * Example:
     * @var NULL
     */
    public $webview_html;

    /**
     * Example:
     * @var NULL
     */
    public $mailable_class;

    /**
     * Example: 1
     * @var bool
     */
    public $track_opens;

    /**
     * Example: 1
     * @var bool
     */
    public $track_clicks;

    /**
     * Example: 1
     * @var bool
     */
    public $utm_tags;

    /**
     * Example: 0
     * @var int
     */
    public $sent_to_number_of_subscribers;

    /**
     * Example:
     * @var NULL
     */
    public $segment_class;

    /**
     * Example: all subscribers
     * @var string
     */
    public $segment_description;

    /**
     * Example: 0
     * @var int
     */
    public $open_count;

    /**
     * Example: 0
     * @var int
     */
    public $unique_open_count;

    /**
     * Example: 0
     * @var int
     */
    public $open_rate;

    /**
     * Example: 0
     * @var int
     */
    public $click_count;

    /**
     * Example: 0
     * @var int
     */
    public $unique_click_count;

    /**
     * Example: 0
     * @var int
     */
    public $click_rate;

    /**
     * Example: 0
     * @var int
     */
    public $unsubscribe_count;

    /**
     * Example: 0
     * @var int
     */
    public $unsubscribe_rate;

    /**
     * Example: 0
     * @var int
     */
    public $bounce_count;

    /**
     * Example: 0
     * @var int
     */
    public $bounce_rate;

    /**
     * Example:
     * @var NULL
     */
    public $sent_at;

    /**
     * Example:
     * @var NULL
     */
    public $statistics_calculated_at;

    /**
     * Example:
     * @var NULL
     */
    public $scheduled_at;

    /**
     * Example: 2021-11-18T19:20:06.000000Z
     * @var string
     */
    public $last_modified_at;

    /**
     * Example:
     * @var NULL
     */
    public $summary_mail_sent_at;

    /**
     * Example: 2021-11-18T19:19:43.000000Z
     * @var string
     */
    public $created_at;

    /**
     * Example: 2021-11-18T19:20:06.000000Z
     * @var string
     */
    public $updated_at;

    /**
     * Set the email list in a resource
     * @param $key
     * @param $data
     */
    public function setEmailList($data)
    {
        $this->email_list = new EmailList($data);
    }
}
