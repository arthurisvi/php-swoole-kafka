<?php

require '../vendor/autoload.php';
require './KafkaProducerConnection.php';

class KafkaProducer {
	private $kafkaManager;
	private $producer;

	public function __construct() {
		$this->kafkaManager = KafkaProducerConnection::getInstance();
		$this->producer = $this->kafkaManager->getProducer();
	}

	public function produceMessages() {
		for ($i = 1; $i <= 10; $i++) {
			$value = "Value " . $i;
			$key = "Key" . $i;
			$this->producer->send('poc-swoole', $value, $key);
			echo "Mensagem $value publicada \n";
		}
	}
}
