
## Быстрый запуск с docker 
Если у вас на машине есть `docker` и `docker-compose`, то после `git clone`, перейдите в корневую папку проекта и выполните 
```
$ docker-compose -f docker/docker-compose.yml run php composer install
```

после этого запустите тест 
```
$ docker-compose -f docker/docker-compose.yml run php bin/phpunit tests/Integration/TurboTestServiceTestCase

```

## Запуск без docker (не проверено)

перейдите в корневую папку проекта и выполните 
```
$ composer install
```

после этого запустите тест 
```
$ php bin/phpunit tests/Integration/TurboTestServiceTestCase

```
### Требования к окружению
 - php7.2-cli
 - composer 

