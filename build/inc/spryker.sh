#!/bin/bash


function configureRabbitMQ() {
    echo "Configure RabbitMQ..."
    docker exec -i rabbitmq rabbitmqctl add_vhost /DE_development_zed
    docker exec -i rabbitmq rabbitmqctl add_user DE_development mate20mg
    docker exec -i rabbitmq rabbitmqctl set_user_tags DE_development administrator
    docker exec -i rabbitmq rabbitmqctl set_permissions -p /DE_development_zed DE_development ".*" ".*" ".*"

    docker exec -i rabbitmq rabbitmqctl add_vhost /US_development_zed
    docker exec -i rabbitmq rabbitmqctl add_user US_development mate20mg
    docker exec -i rabbitmq rabbitmqctl set_user_tags US_development administrator
    docker exec -i rabbitmq rabbitmqctl set_permissions -p /US_development_zed US_development ".*" ".*" ".*"

    docker exec -i rabbitmq rabbitmqctl add_vhost /AT_development_zed
    docker exec -i rabbitmq rabbitmqctl add_user AT_development mate20mg
    docker exec -i rabbitmq rabbitmqctl set_user_tags AT_development administrator
    docker exec -i rabbitmq rabbitmqctl set_permissions -p /AT_development_zed AT_development ".*" ".*" ".*"
}

function finalizeSpryker() {
    docker exec -i php chown -Rf www-data:www-data /data
}

function installSpryker() {
    configureRabbitMQ

    docker exec -i php bash -c "composer global require hirak/prestissimo"

    echo "Configure jenkins..."
    docker exec -i --user root jenkins usermod -m -d /data/shop/development/current jenkins

    echo "Composer install..."
    docker exec -i php bash -c "rm -rf /data/shop/development/current/vendor/bin/*" | true
    docker exec -i php composer install --prefer-dist

    echo "Spryker install..."
    docker exec -i php php /data/shop/development/current/vendor/bin/install

    finalizeSpryker
}

function deploySpryker() {
    configureRabbitMQ

    $BASEDIR/console log:clear
    $BASEDIR/console cache:empty-all
    $BASEDIR/console setup:jenkins:disable
    $BASEDIR/console transfer:generate
    $BASEDIR/console twig:cache:warmer
    $BASEDIR/console navigation:build-cache
    $BASEDIR/console propel:migrate
    $BASEDIR/console data:import
    $BASEDIR/console transfer:generate
    $BASEDIR/console product-label:relations:update
    $BASEDIR/console setup:jenkins:generate
    $BASEDIR/console setup:jenkins:enable
    $BASEDIR/console frontend:project:install-dependencies
    $BASEDIR/console frontend:yves:install-dependencies
    $BASEDIR/console frontend:yves:build
    $BASEDIR/console frontend:zed:install-dependencies
    $BASEDIR/console frontend:zed:build


    docker exec -i php chmod -Rf 0777 /data/shop/development/current/data

    docker exec -i php ln -s /data/shop/development/current/vendor/bin/codecept /usr/local/bin/codecept
    docker exec -i php ln -s /data/shop/development/current/vendor/bin/console /usr/local/bin/console
}

