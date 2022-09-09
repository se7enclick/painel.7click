FROM phpdockerio/php:7.4-fpm
WORKDIR "/var/www"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php7.4-intl \ 
        php7.4-mysql; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
