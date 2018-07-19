#!/bin/bash

function xdebug_enable() {
    docker exec -it php mv /usr/local/etc/php/conf.d/docker-php-ext-xdebug.inactive /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
    docker restart php
}

function xdebug_disable() {
    docker exec -it php mv /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.inactive
    docker restart php
}