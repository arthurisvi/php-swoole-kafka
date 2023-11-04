<?php

require '../vendor/autoload.php';

use longlang\phpkafka\Consumer\ConsumeMessage;
use longlang\phpkafka\Consumer\Consumer;
use longlang\phpkafka\Consumer\ConsumerConfig;
use Swoole\Coroutine as Co;

function consume(ConsumeMessage $message): void {
	echo $message->getKey() . ":" . $message->getValue() . "\n";
}

Co\run(static function (): void {
	echo "Iniciando configuração...\n";
	$startConfigTime = microtime(true);
	$config = new ConsumerConfig();
	$config->setBroker('kafka:9092');
	$config->setTopic('poc-swoole');
	$config->setGroupId('group1');
	$config->setClientId('test_poc_swoole');
	$config->setGroupInstanceId('test_poc_swoole');

	$consumer = new Consumer($config, 'consume');
	$endConfigTime = microtime(true);
	echo "Configuração do Kafka concluída em " . ($endConfigTime - $startConfigTime) . " microssegundos\n";
	$consumer->start();
});
