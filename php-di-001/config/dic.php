<?php

use function DI\object;
use function DI\factory;
use function DI\get;

use Interop\Container\ContainerInterface;
use JK\DicExample\PhpDi\C;
use JK\DicExample\PhpDi\Database;
use JK\DicExample\PhpDi\DatabaseInterface;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

return [
    'db.host'                => 'localhost',
    'db.user'                => 'username',
    Database::class => object()->constructor(get(LoggerInterface::class), get('db.host'), get('db.user')),
//    Database::class          => factory(function (LoggerInterface $logger, ContainerInterface $c) {
//        $logger->info('factory method/definition of ' . Database::class . ' was called');
//        return new Database($logger, $c->get('db.host'), $c->get('db.user'));
//    }),
    DatabaseInterface::class => get(Database::class),
    C::class                 => object()->constructorParameter('age', 42),
    LoggerInterface::class   => factory(function () {
        $logger = new Logger('dummy');

        $echoStreamHandler = new StreamHandler('php://output');
        $echoStreamHandler->setFormatter(new LineFormatter());
        $logger->pushHandler($echoStreamHandler);

        return $logger;
    })
];
