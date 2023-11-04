<?php

require '../vendor/autoload.php';

use longlang\phpkafka\Producer\Producer;
use longlang\phpkafka\Producer\ProducerConfig;
use Swoole\Coroutine as Co;

Co\run(static function (): void {
	echo "Iniciando configuração...\n";
	$startConfigTime = microtime(true);
	$config = new ProducerConfig();
	$config->setBootstrapServer('kafka:9092');
	$config->setUpdateBrokers(true);
	$config->setAcks(-1);

	$producer = new Producer($config);

	$endConfigTime = microtime(true);

	$startPublishTime = microtime(true);
	for ($i = 1; $i <= 1000; $i++) {
		$value = "Value " . $i;
		$key = "Key" . $i;
		$producer->send('poc-swoole', $value, $key);
		echo "Mensagem $value publicada\n";
	}

	$endPublishTime = microtime(true);
	echo "Configuração do Kafka concluída em " . ($endConfigTime - $startConfigTime) . " microssegundos\n";
	echo "Ação de publicar mensagens concluída em " . ($endPublishTime - $startPublishTime) . " microssegundos\n";
	echo "Tempo total: " . ($endPublishTime - $startConfigTime) . " microssegundos\n";
	echo "Finalizou!\n";
});
