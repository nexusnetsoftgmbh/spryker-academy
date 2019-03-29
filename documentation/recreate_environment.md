# Recreate local environment

This process removes all local changes.

___Start in your project directory___  
1. Remove folder: ./current/vendor
2. Remove folder: ./current/node_modules
3. Shutdown and remove docker environment: vendor/bin/nxscli project:env:rm
4. Remove folder: ./vendor
5. Git reset: git reset --hard HEAD
6. Git checkout: git checkout .
7. Git pull: git pull origin master
8. Run: composer install
9. Init environment: vendor/bin/nxscli project:init
10. Start environment: vendor/bin/nxscli project:env:run
11. Copy files to docker: vendor/bin/nxscli docker:cp . spy_php:/data/shop/development/  
12. Run spryker install: vendor/bin/nxscli project:spryker:install -vvv
13. Check your hosts-file for all necessary domains: (www|zed|api).(de|at|us).suite.local