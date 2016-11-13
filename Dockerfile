FROM ubuntu

MAINTAINER Exadra37 <exadra37@gmail.com>

RUN apt-get update && apt-get -y install zsh curl git vim zip composer php-xdebug php-xsl apache2 libapache2-mod-php7.0

RUN git config --global user.email "exadra37@gmail.com"

RUN git config --global user.name "Exadra37"

# Enhance ZSH shell with the wonderful Oh My ZSH
RUN bash -c "$(curl -fsSL https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"

# Set ZSH as the default shell
RUN chsh -s /usr/bin/zsh

ADD ./deploy/apache2/conf-available/rewrite.conf /etc/apache2/conf-available/rewrite.conf

RUN a2enconf rewrite

ENTRYPOINT service apache2 start && zsh
