<?php


namespace JK\DicExample\PhpDi;


use Psr\Log\LoggerInterface;

/**
 * Class Database
 *
 * @Injectable(lazy=true)
 * @package JK\DicExample\PhpDi
 */
class Database implements DatabaseInterface
{
    /** @var LoggerInterface Logger */
    protected $logger;

    /**
     * Database constructor.
     */
    public function __construct(LoggerInterface $logger, string $host, string $user)
    {
        $this->logger = $logger;
        $logger->critical(self::class . ' constructor called');
        $logger->info(__CLASS__ . ' initalized on host ' . $host . ' as ' . $user);
    }

    public function doSomething(): void {
        $this->logger->info(__FUNCTION__ . ' on ' . __CLASS__ .' was called');
    }
}
