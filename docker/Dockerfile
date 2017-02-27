FROM ubuntu

MAINTAINER Exadra37 <exadra37@gmail.com>

RUN apt-get update && apt-get -y upgrade

RUN apt-get -y install \
    sudo \
    zsh \
    curl \
    git \
    vim \
    zip \
    composer \
    php-xdebug \
    php-xsl \
    apache2 \
    libapache2-mod-php7.0

# Cleanup
RUN rm -rf /var/lib/apt/lists/*

RUN locale-gen en_GB.UTF-8

ENV LANG en_GB.UTF-8
ENV LANGUAGE en_GB:en
ENV LC_ALL en_GB.UTF-8

ARG HOST_USER="${HOST_USER}"
ARG HOST_UID="${HOST_UID}"
ARG HOST_GID="${HOST_GID}"

# Add new sudo user
# Setup Oh My Zsh and Git in the new User
RUN useradd -m "${HOST_USER}" && \
    echo "${HOST_USER}:${HOST_USER}" | chpasswd && \
    usermod --shell /usr/bin/zsh "${HOST_USER}" && \
    usermod -aG sudo "${HOST_USER}" && \
    echo "${HOST_USER} ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers.d/"${HOST_USER}" && \
    chmod 0440 /etc/sudoers.d/"${HOST_USER}" && \
    usermod  --uid "${HOST_UID}" "${HOST_USER}" && \
    groupmod --gid "${HOST_GID}" "${HOST_USER}" && \
    su "${HOST_USER}" -c 'git config --global user.name "Exadra37"' && \
    su "${HOST_USER}" -c 'git config --global user.email "exadra37@gmail.com"' && \
    su "${HOST_USER}" -c 'bash -c "$(curl -fsSL https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"'

ADD ./apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf

CMD /usr/sbin/apache2ctl -D FOREGROUND
