<?php


namespace JK\DicExample\PhpDi;


use Psr\Log\LoggerInterface;

class C
{
    /** @var int age */
    protected $age;
    /** @var DatabaseInterface DB */
    protected $db;
    /** @var LoggerInterface Logger */
    protected $logger;

    /**
     * C constructor.
     */
    public function __construct(DatabaseInterface $db, LoggerInterface $logger, int $age)
    {
        $this->db = $db;
        $this->logger = $logger;
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}
