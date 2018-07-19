Spryker Academy
=====================

Run environment
-------------------
During the commands are running there could be some errors. You can ignore them.

```
bash env.sh prepare
bash env.sh run

docker cp current data:/data/shop/development/

bash env.sh spryker install
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