<?php

namespace CS\Domain\Exception;

class UnknownDirectionException extends \Exception
{
    /** @var string */
    private $direction;

    /**
     * @param string $direction
     * @param \Exception $previous
     * @param string $message
     */
    public function __construct($direction, $previous = null, $message = "Unknown direction")
    {
        $this->direction = $direction;

        parent::__construct($message, 0, $previous);
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }
}
