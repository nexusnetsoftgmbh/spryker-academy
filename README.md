Spryker Academy
=====================

Run environment
-------------------
```bash

# Install NEXUS CLI
composer install
php vendor/bin/nxscli project:init
# Ignore this error: ERROR: pull access denied for spryker_data, repository does not exist or may require 'docker login'
php vendor/bin/nxscli project:env:run
php vendor/bin/nxscli docker:exec php "composer global require hirak/prestissimo"
php vendor/bin/nxscli docker:cp . php:/data/shop/development/
php vendor/bin/nxscli project:spryker:install -vvv

```


Other Commands
-------------------
```bash
# Remove environment
php vendor/bin/nxscli project:env:rm

# Run Spryker commands
php vendor/bin/nxscli spryker:console <your command>
```


URLs
------------------------

***DE***
http://www.de.suite.local
http://zed.de.suite.local

***AT***
http://www.at.suite.local
http://zed.at.suite.local

***US***
http://www.us.suite.local
http://zed.us.suite.local

***Jenkins***
http://www.de.suite.local:8080

***RabbitMQ***
http://www.de.suite.local:15672


Configuration
------------------------
I suggest to increase the count of build processors in jenkins: http://www.de.suite.local:8080/configure


Logins
-----------
***RabbitMQ***
User: admin
Pass: mate20mg

***Postgres***
User: spryker
Pass: mate20mg

***Zed***
User: admin@spryker.com
Pass: change123