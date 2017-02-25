FROM ubuntu

MAINTAINER Exadra37 <exadra37@gmail.com>

RUN apt-get update && apt-get -y upgrade

RUN apt-get -y install \
    php-xsl \
    apache2 \
    libapache2-mod-php7.0 && \
    apt-get -f -y install && \
    rm -rf /var/lib/apt/lists/* && \
    locale-gen en_GB.UTF-8

ENV LANG en_GB.UTF-8
ENV LANGUAGE en_GB:en
ENV LC_ALL en_GB.UTF-8

ARG SERVER_DOMAIN="${SERVER_DOMAIN}"
ARG SERVER_EMAIL="${SERVER_EMAIL}"

ADD apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN sed -i "s/__SERVER_DOMAIN__/${SERVER_DOMAIN}/g" /etc/apache2/sites-available/000-default.conf && \
    sed -i "s/__SERVER_EMAIL__/${SERVER_EMAIL}/g" /etc/apache2/sites-available/000-default.conf

CMD /usr/sbin/apache2ctl -D FOREGROUND
