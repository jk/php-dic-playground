<?php


namespace JK\DicExample\PhpDi;


use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class B
{
    /** @var LoggerInterface Logger */
    private $logger;

    /** @var A a */
    private $a;

    /**
     * B constructor.
     */
    public function __construct(A $a)
    {
        $this->a = $a;
        $this->logger = new NullLogger();
    }

    /**
     * @Inject
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
        $logger->info('Logger is set');
    }



}
