FROM php:7.2.16-fpm
MAINTAINER Mike Bertram <bertram@nexus-netsoft.com>


RUN apt-get update \
 && apt-get install -y lsb-release gnupg vim git curl wget sudo libpq-dev zlib1g-dev libicu-dev \
                        g++ libgmp-dev libmcrypt-dev libbz2-dev libpng-dev libjpeg62-turbo-dev \
                        libfreetype6-dev libssh2-1-dev libssh2-1 libxml2-dev libfontconfig zip unzip \
 && echo "deb http://apt.postgresql.org/pub/repos/apt/ `lsb_release -cs`-pgdg main" >> /etc/apt/sources.list.d/pgdg.list \
 && wget -q https://www.postgresql.org/media/keys/ACCC4CF8.asc -O - | sudo apt-key add - \
 && apt-get update \
 && apt-get install -y postgresql-client-9.6 \
 && rm -rf /var/lib/apt/lists/*


RUN docker-php-ext-install -j$(nproc) iconv pdo pgsql pdo_pgsql intl bcmath gmp bz2 zip sockets soap \
 && apt-get clean

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
 && docker-php-ext-install -j$(nproc) gd

RUN pecl install -o -f ssh2-1.1.2 \
 && pecl install -o -f mcrypt \
 && pecl install -o -f redis \
 && pecl install -o -f xdebug \
 && docker-php-ext-enable ssh2 \
 && docker-php-ext-enable mcrypt \
 && docker-php-ext-enable redis \
 && docker-php-ext-enable xdebug \
 && echo "" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.default_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.profiler_enable=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_connect_back=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.idekey=\"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && mv /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.inactive


RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php composer-setup.php \
 && php -r "unlink('composer-setup.php');" \
 && mv composer.phar /usr/local/bin/composer \
 && chmod +x /usr/local/bin/composer \
 && /usr/local/bin/composer global require hirak/prestissimo

ENV NVM_DIR /usr/local/nvm
ENV NVM_VERSION v0.34.0
ENV NODE_VERSION 10.15.3

# NVM & NPM
RUN mkdir -p $NVM_DIR \
 && curl https://raw.githubusercontent.com/creationix/nvm/$NVM_VERSION/install.sh | bash \
 && . $NVM_DIR/nvm.sh \
 && bash -i -c 'nvm ls-remote' \
 && bash -i -c 'nvm install $NODE_VERSION'

RUN ln -s $NVM_DIR/versions/node/v$NODE_VERSION/bin/node /usr/local/bin/node \
 && ln -s $NVM_DIR/versions/node/v$NODE_VERSION/bin/npm /usr/local/bin/npm

WORKDIR /data/shop/development/current

VOLUME ["/usr/local/etc/php/conf.d"]