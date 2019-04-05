#!/bin/bash

if [ "$1" == "try" ]; then
    echo "Try sync"
    rsync -aun --stats --progress --delete --exclude=".idea/" --exclude=".git/" --exclude=".*" moot@10.10.11.1:~/spryker-academy/ ./
else
    echo "Real sync"
    rsync -au --stats --progress --delete --exclude=".idea/" --exclude=".git/" --exclude=".*" moot@10.10.11.1:~/spryker-academy/ ./
fi