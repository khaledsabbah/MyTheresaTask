<?php

namespace App\Exceptions;

use Exception;

class StoreNotFoundException extends Exception
{
    /**
     * @var string
     */
    protected $message = "Store Not Found Exception";
    /**
     * @var string
     */
    protected $storeName;

    /**
     * StoreNotFoundException constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setStoreName($name);
        $this->setMessage("Store ( " . $this->getStoreName() . " ) Not Found Exception");
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
