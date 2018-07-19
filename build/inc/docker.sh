#!/bin/bash


COMPOSE_FILES="-f docker-compose.yaml -f docker-local.yaml"

function docker_rm() {
    docker-compose -f docker-compose.yaml -f docker-local.yaml rm -fsv
    docker volume rm projectdata
    docker volume rm dbdata
    docker volume rm elasticdata
    docker volume rm redisdata
    docker rmi -f spryker_data
}

function docker_stop() {
    docker-compose $COMPOSE_FILES stop
}

function docker_start() {
    docker-compose $COMPOSE_FILES start
}

function docker_prepare() {
    docker volume create projectdata
    docker volume create dbdata
    docker volume create elasticdata
    docker volume create redisdata
}

function docker_pull() {
    docker-compose $COMPOSE_FILES pull
}

function docker_up() {
    docker-compose $COMPOSE_FILES up -d
}

function docker_build() {
    docker-compose $COMPOSE_FILES build
}