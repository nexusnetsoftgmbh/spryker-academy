# Docker environment  
  
## Use last build  
```  
  # First time  
  composer install  
  vendor/bin/nxscli project:init  
  #####################
  # !! Ignore this error:
  # !! "ERROR: pull access denied for spryker_data, repository does not exist or may require 'docker login'"
  ######################################
  vendor/bin/nxscli project:env:run  
  vendor/bin/nxscli project:restore ssh  
  vendor/bin/nxscli project:spryker:deploy  
  
  # Update  
  vendor/bin/nxscli project:restore ssh  
  vendor/bin/nxscli project:spryker:deploy  
```  
  
   
## Run from scratch:  
```  
  composer install  
  vendor/bin/nxscli project:init  
  vendor/bin/nxscli project:env:run  
  vendor/bin/nxscli docker:cp . spy_php:/data/shop/development/  
  vendor/bin/nxscli project:spryker:install  
  
  # alternative to docker:cp:
  rsync -av -e 'ssh -p 2222' --exclude=vendor/ ./current/ root@127.0.0.1:/data/shop/development/current/
```  


## Run Spryker console command
```
    vendor/bin/nxscli project:spryker:console <command> <store: de|us|at> <visibility: -vvv>
    
    # Example
    vendor/bin/nxscli pr:sp:co "transfer:generate" de -vvv
```


## Local config
In your local setup you have to use the config_local.dist.php and copy it to config_local.php. Otherwise there will be problems with jenkins.

## Domains and Hosts

You can reach the (DE) store with:  
* http://www.de.suite.local (zed)
* http://zed.de.suite.local (zed)
* http://api.de.suite.local (api)

You can reach the (AT) store with:  
* http://www.at.suite.local (zed)
* http://zed.at.suite.local (zed)
* http://api.at.suite.local (api)

You can reach the (US) store with:  
* http://www.us.suite.local (zed)
* http://zed.us.suite.local (zed)
* http://api.us.suite.local (api)

For Glue API documentation you can view:
* http://api.doc.suite.local


ZED credentials are:  
***Username*** admin@spryker.com  
***Password*** change123  
  
To reache the domains from local, you have to add this entries to your hosts-config:  
```
127.0.0.1    www.de.suite.local
127.0.0.1    zed.de.suite.local
127.0.0.1    api.de.suite.local
127.0.0.1    www.at.suite.local
127.0.0.1    zed.at.suite.local
127.0.0.1    api.at.suite.local
127.0.0.1    www.us.suite.local
127.0.0.1    zed.us.suite.local
127.0.0.1    api.us.suite.local
127.0.0.1    api.swagger.suite.local
127.0.0.1    api.doc.suite.local
```
