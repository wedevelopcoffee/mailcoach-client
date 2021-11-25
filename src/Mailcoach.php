<?php

namespace WeDevelopCoffee\MailcoachClient;

use WeDevelopCoffee\MailcoachClient\Endpoints\Campaign;
use WeDevelopCoffee\MailcoachClient\Endpoints\EmailList;
use WeDevelopCoffee\MailcoachClient\Endpoints\Subscriber;
use WeDevelopCoffee\MailcoachClient\Endpoints\SubscriberImport;
use WeDevelopCoffee\MailcoachClient\Endpoints\Template;
use WeDevelopCoffee\MailcoachClient\Handlers\Api;

class Mailcoach
{
    /**
     * @var Api
     */
    public $api;

    /***
     * @var EmailList
     */
    protected EmailList $emailList;
    protected Subscriber $subscriber;
    protected Campaign $campaign;
    protected Template $template;
    protected SubscriberImport $subscriberImport;

    public function __construct($url, $key)
    {
        $this->api = new Api($url, $key);
    }

    public function campaign()
    {
        if (empty($this->campaign)) {
            $this->campaign = new Campaign($this);
        }

        return $this->campaign;
    }

    /**
     * @return EmailList
     */
    public function emailList()
    {
        if (empty($this->emailList)) {
            $this->emailList = new EmailList($this);
        }

        return $this->emailList;
    }

    /**
     * @return Subscriber
     */
    public function subscriber($id)
    {
        if (empty($this->subscriber)) {
            $this->subscriber = new Subscriber($this);
        }

        $this->subscriber->setId($id);

        return $this->subscriber;
    }

    public function template()
    {
        if (empty($this->template)) {
            $this->template = new Template($this);
        }

        return $this->template;
    }

    public function subscriberImport()
    {
        if (empty($this->subscriberImport)) {
            $this->subscriberImport = new SubscriberImport($this);
        }

        return $this->subscriberImport;
    }
}
