#!/bin/bash

BASEDIR=$1
PROJECTNAME="sprykeracademy"

echo "Run environment"
echo "===================================="
echo "Basepath: $BASEDIR"


source $BASEDIR/build/inc/docker.sh
source $BASEDIR/build/inc/dumper.sh
source $BASEDIR/build/inc/spryker.sh
source $BASEDIR/build/inc/xdebug.sh


if [[ "$2" == "prepare" ]]
then
    docker_prepare
fi

if [[ "$2" == "up" ]]
then
    docker_up
fi

if [[ "$2" == "run" ]]
then
    docker_pull
    docker_up
    docker exec -i loadbalancer bash -c "rm -f /etc/nginx/conf.d/default"
    docker restart loadbalancer
fi

if [[ "$2" == "rm" ]]
then
    docker_rm
fi


if [[ "$2" == "xdebug" ]]
then
    if [[ "$3" == "enable" ]]
    then
        xdebug_enable
    fi

    if [[ "$3" == "disable" ]]
    then
        xdebug_disable
    fi
fi

if [[ "$2" == "restore" ]]
then
    if [[ "$3" == "ssh" ]]
    then
        dumper_restore_ssh
    fi

    if [[ "$3" == "local" ]]
    then
        dumper_restore_local
    fi
fi

if [[ "$2" == "dump" ]]
then
    if [[ "$3" == "ssh" ]]
    then
        dumper_dump_ssh
    fi

    if [[ "$3" == "local" ]]
    then
        dumper_dump_local
    fi
fi

if [[ "$2" == "spryker" ]]
then
    if [[ "$3" == "install" ]]
    then
        installSpryker
    fi

    if [[ "$3" == "deploy" ]]
    then
        deploySpryker
    fi
fi