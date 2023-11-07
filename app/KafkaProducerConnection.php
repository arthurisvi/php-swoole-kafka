<?php

require '../vendor/autoload.php';

use longlang\phpkafka\Producer\Producer;
use longlang\phpkafka\Producer\ProducerConfig;

class KafkaProducerConnection {
	private static $instance;
	private $producer;

	private function __construct() {
		echo "Inicia conexão Producer\n";
		$config = new ProducerConfig();
		$config->setBootstrapServer('kafka:9092');
		$config->setUpdateBrokers(true);
		$config->setAcks(-1);

		$this->producer = new Producer($config);
	}

	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new KafkaProducerConnection();
		}

		return self::$instance;
	}

	public function getProducer() {
		return $this->producer;
	}
}
