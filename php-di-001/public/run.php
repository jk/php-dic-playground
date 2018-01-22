<?php

use JK\DicExample\PhpDi\A;
use JK\DicExample\PhpDi\B;
use JK\DicExample\PhpDi\C;
use Psr\Log\LoggerInterface;

require __DIR__ . '/../vendor/autoload.php';

// DIC
$builder = new \DI\ContainerBuilder();
$builder->ignorePhpDocErrors(true);
$builder->useAnnotations(true);
$builder->useAutowiring(true);
$builder->addDefinitions(__DIR__ . '/../config/dic.php');
//$builder->setDefinitionCache(new \Doctrine\Common\Cache\ArrayCache());
//$builder->writeProxiesToFile(true, 'tmp/proxies');

$container = $builder->build();

/** @noinspection PhpUnhandledExceptionInspection */
$logger = $container->get(LoggerInterface::class);

try {
    $logger->debug('About to get ' . A::class);
    $a = $container->get(A::class);
    $logger->debug('About to get ' . B::class);
    $b = $container->get(B::class);
    $logger->debug('About to get ' . C::class);
    $c = $container->get(C::class);

    $logger->debug('call doSomeHeavyWork() on ' . A::class);
    $a->doSomeHeavyWork();
} catch (\DI\DependencyException $e) {

    $logger->error('Dependency Excpetion: ' . $e->getMessage());
} catch (\DI\NotFoundException $e) {
    $logger->error('Dependency not found: ' . $e->getMessage());
}
