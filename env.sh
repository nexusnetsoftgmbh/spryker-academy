#!/bin/bash

BASEDIR="$( cd "$(dirname "$0")" ; pwd -P )"

bash -c "bash $BASEDIR/build/env.sh $BASEDIR $*"