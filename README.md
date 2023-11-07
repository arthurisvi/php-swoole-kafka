Esse é um projeto de estudos envolvendo uma configuração simples de PHP utilizando o Swoole e mensageria com Kafka.

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
php producer.php
```
```
php consumer.php
```
