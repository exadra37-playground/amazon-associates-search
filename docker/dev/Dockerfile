FROM ubuntu-prod

MAINTAINER Exadra37 <exadra37@gmail.com>

ARG SERVER_DOMAIN="${SERVER_DOMAIN}"
ARG SERVER_EMAIL="${SERVER_EMAIL}"


RUN apt-get update && apt-get -y upgrade

RUN sed -i "s/__SERVER_DOMAIN__/${SERVER_DOMAIN}/g" /etc/apache2/sites-available/000-default.conf && \
    sed -i "s/__SERVER_EMAIL__/${SERVER_EMAIL}/g" /etc/apache2/sites-available/000-default.conf

CMD /usr/sbin/apache2ctl -D FOREGROUND
