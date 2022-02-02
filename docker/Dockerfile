FROM yiisoftware/yii2-php:7.3-apache

RUN apt-get update && apt-get install -y \
    cron \
    rsyslog

RUN apt update \
    && apt install nodejs -y \
    npm  -y

RUN pecl uninstall xdebug
RUN pecl install xdebug-2.9.5
RUN docker-php-ext-enable xdebug

WORKDIR /app

#запускаем процесс apache2
CMD service cron start && service rsyslog start && /usr/sbin/apache2ctl -D FOREGROUND