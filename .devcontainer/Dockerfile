# See here for image contents: https://github.com/microsoft/vscode-dev-containers/tree/v0.177.0/containers/ubuntu/.devcontainer/base.Dockerfile

# [Choice] Ubuntu version: bionic, focal
ARG VARIANT="focal"
FROM mcr.microsoft.com/vscode/devcontainers/base:0-${VARIANT}

RUN sudo apt update -y
RUN sudo apt install software-properties-common -y
RUN sudo add-apt-repository ppa:ondrej/php -y
RUN sudo apt update -y
RUN sudo apt install -y php7.2 openssl libapache2-mod-php
RUN sudo apt install -y php7.2-bcmath php7.2-json php7.2-common php7.2-bcmath openssl php7.2-json php7.2-mbstring php7.2-xml php7.2-xmlrpc php7.2-curl php7.0-mysql php7.2-sqlite3 php7.2-gd php7.2-zip

# Installing composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN sudo mv composer.phar /usr/local/bin/composer
