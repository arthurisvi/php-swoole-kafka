<?php

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

require './KafkaProducer.php';

$http = new Server("0.0.0.0", 8080);

$http->on("start", function () {
	echo "Servidor Swoole iniciado na porta 8080." . PHP_EOL;
});

$http->on("request", function (Request $request, Response $response) {
	$path = $request->server['request_uri'];

	if ($path === '/produce') {
		$kafkaProducer = new KafkaProducer();
		$kafkaProducer->produceMessages();
	}
});

$http->start();
