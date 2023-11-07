Esse é um projeto de estudos envolvendo uma configuração simples de PHP utilizando o Swoole e mensageria com Kafka.

A aplicação é capaz de produzir e consumir mensagens do Kafka utilizando PHP/Swoole. Seu intuito é demonstrar que o PHP utilizando Swoole é capaz de fazer tais ações sem precisar reabrir conexão para cada vez que precisar publicar ou consumir mensagens.

Para gerar o container com as dependências:
```
docker-compose build
```

```
docker-compose up -d
```


Dentro do container, execute os seguintes comandos:
```
composer install
```
```
composer dump-autoload
```
```
cd app
```
```
php server.php
```
```
php consumer.php
```

Para produzir as mensagens no Kafka é necessário fazer um request:
```
curl localhost:8080/produce
```
