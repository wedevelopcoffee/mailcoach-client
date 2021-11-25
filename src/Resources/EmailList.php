<?php

namespace WeDevelopCoffee\MailcoachClient\Resources;

class EmailList extends Resource
{
    /**
     * Example: 1
     * @var int
     */
    public $id;

    /**
     * Example: b4916389-492b-427d-9c79-bd5ddbd874eb
     * @var string
     */
    public $uuid;

    /**
     * Example: List 1
     * @var string
     */
    public $name;

    /**
     * Example: 50
     * @var int
     */
    public $active_subscribers_count;

    /**
     * Example:
     * @var bool
     */
    public $campaigns_feed_enabled;

    /**
     * Example: mail@gmail.com
     * @var string
     */
    public $default_from_email;

    /**
     * Example:
     * @var NULL
     */
    public $default_from_name;

    /**
     * Example: mail@gmail.com
     * @var string
     */
    public $default_reply_to_email;

    /**
     * Example:
     * @var NULL
     */
    public $default_reply_to_name;

    /**
     * Example:
     * @var bool
     */
    public $allow_form_subscriptions;

    /**
     * Example:
     * @var NULL
     */
    public $redirect_after_subscribed;

    /**
     * Example:
     * @var NULL
     */
    public $redirect_after_already_subscribed;

    /**
     * Example:
     * @var NULL
     */
    public $redirect_after_subscription_pending;

    /**
     * Example:
     * @var NULL
     */
    public $redirect_after_unsubscribed;

    /**
     * Example:
     * @var bool
     */
    public $requires_confirmation;

    /**
     * Example:
     * @var NULL
     */
    public $confirmation_mail_subject;

    /**
     * Example:
     * @var NULL
     */
    public $confirmation_mail_content;

    /**
     * Example:
     * @var NULL
     */
    public $confirmation_mailable_class;

    /**
     * Example: mailcoach
     * @var string
     */
    public $campaign_mailer;

    /**
     * Example: mailcoach
     * @var string
     */
    public $transactional_mailer;

    /**
     * Example:
     * @var bool
     */
    public $send_welcome_mail;

    /**
     * Example:
     * @var NULL
     */
    public $welcome_mail_subject;

    /**
     * Example:
     * @var NULL
     */
    public $welcome_mail_content;

    /**
     * Example:
     * @var NULL
     */
    public $welcome_mailable_class;

    /**
     * Example: 0
     * @var int
     */
    public $welcome_mail_delay_in_minutes;

    /**
     * Example:
     * @var NULL
     */
    public $report_recipients;

    /**
     * Example:
     * @var bool
     */
    public $report_campaign_sent;

    /**
     * Example:
     * @var bool
     */
    public $report_campaign_summary;

    /**
     * Example:
     * @var bool
     */
    public $report_email_list_summary;

    /**
     * Example:
     * @var NULL
     */
    public $email_list_summary_sent_at;

    /**
     * Example: 2021-11-18T16:52:00.000000Z
     * @var string
     */
    public $created_at;

    /**
     * Example: 2021-11-18T16:52:00.000000Z
     * @var string
     */
    public $updated_at;

    /**
     * Fetch related subscribers.
     * @return \WeDevelopCoffee\MailcoachClient\Endpoints\Subscriber
     */
    public function subscriber()
    {
        return $this->mailcoach->subscriber($this->id);
    }
}
