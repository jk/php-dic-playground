<?php


namespace JK\DicExample\PhpDi;


use Psr\Log\LoggerInterface;

interface DatabaseInterface
{
    public function __construct(LoggerInterface $logger, string $host, string $user);
    public function doSomething(): void;
}
