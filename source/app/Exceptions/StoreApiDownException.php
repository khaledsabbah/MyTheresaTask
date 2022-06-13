<?php

namespace App\Exceptions;

use Exception;

class StoreApiDownException extends Exception
{

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $storeName;

    /**
     * StoreApiDownException constructor.
     * @param $url
     * @param $storeName
     */
    public function __construct($url, $storeName)
    {
        $this->setUrl($url);
        $this->setStoreName($storeName);
        $this->setMessage("Store( " . $this->getStoreName() . " ) API Down" . $this->getUrl());
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getStoreName(): string
    {
        return $this->storeName;
    }

    /**
     * @param string $storeName
     */
    public function setStoreName(string $storeName): void
    {
        $this->storeName = $storeName;
    }


}
