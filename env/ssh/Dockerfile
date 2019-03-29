FROM robertdebock/docker-centos-openssh
MAINTAINER Mike Bertram <bertram@nexus-netsoft.com>

RUN yum -y install rsync vim

ADD ./keys /root/.ssh
RUN echo 'root:nexus123' | chpasswd \
 && chmod -Rf 0600 /root/.ssh/*

WORKDIR /data/shop/development