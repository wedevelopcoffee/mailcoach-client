<?php

namespace WeDevelopCoffee\MailcoachClient\Resources;

class Resource
{
    protected $mailcoach;

    public function __construct($mailcoach, $data = [])
    {
        $this->mailcoach = $mailcoach;

        if (empty($data)) {
            return;
        }

        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * Write data to the resource.
     * @param $key
     * @param $data
     */
    public function set($key, $data)
    {
        $setter = $this->generateSetter($key);

        if (method_exists($this, $setter)) {
            return $this->$setter($data);
        }

        $this->$key = $data;
    }

    /**
     * This tool generates a resource to the screen.
     * @param $key
     * @param $data
     */
    public function generateResourceProperty($key, $data)
    {
        $type = gettype($data);

        if (! is_array($data)) {
            $example_data = $data;
        } elseif (is_array($data)) {
            $example_data = str_replace("\n", "", print_r($data, true));
        } // flatten the array.

        $setter = $this->generateSetter($key);

        if (method_exists($this, $setter)) {
            // Simulate that we set the data.
            $this->$setter([]);

            // Get the type.
            $type = get_class($this->$key);

            $path = explode('\\', $type);
            $example_data = array_pop($path);
        }

        echo "
    /**
     * Example: " . $example_data . "
     * @var " . $type . "
    */
    public \$$key;
";
    }

    protected function generateSetter($key)
    {
        $setter = 'set';

        $parts = explode('_', $key);
        foreach ($parts as $part) {
            $setter .= ucfirst($part);
        }

        return $setter;
    }
}
