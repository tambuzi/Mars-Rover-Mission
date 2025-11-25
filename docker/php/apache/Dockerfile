FROM ubuntu:24.04

ARG PHP_VERSION=8.4
ARG COMPOSER_VERSION=2.9.2
ARG XDEBUG_CLIENT=host.docker.internal
ENV APACHE_NO_ACCESS_LOG=true

ENV LANG=C.UTF-8 \
    LC_ALL=C.UTF-8 \
    LANGUAGE=C.UTF-8 \
    DEBIAN_FRONTEND=noninteractive

# -------------------------------
# BASE + REPOS
# -------------------------------
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        git zip unzip less elvis-tiny curl gpg-agent \
        software-properties-common && \
    add-apt-repository -y ppa:ondrej/php && \
    add-apt-repository -y ppa:ondrej/apache2 && \
    apt-get update

# -------------------------------
# PHP + APACHE
# -------------------------------
RUN apt-get install -y --no-install-recommends \
        apache2 \
        php${PHP_VERSION} \
        php${PHP_VERSION}-curl \
        php${PHP_VERSION}-mbstring \
        php${PHP_VERSION}-zip \
        php${PHP_VERSION}-xml \
        php${PHP_VERSION}-mysql \
        php${PHP_VERSION}-intl \
        php${PHP_VERSION}-gd \
        php${PHP_VERSION}-grpc \
        php${PHP_VERSION}-rdkafka \
        php${PHP_VERSION}-xdebug \
        php${PHP_VERSION}-redis \
        php${PHP_VERSION}-amqp \
    && a2dismod mpm_event \
    && a2enmod mpm_prefork php${PHP_VERSION} rewrite

# -------------------------------
# UNIFICAR PHP (apache2 = cli = default)
# -------------------------------
RUN mv /etc/php/${PHP_VERSION}/apache2 /etc/php/${PHP_VERSION}/default && \
    ln -s /etc/php/${PHP_VERSION}/default /etc/php/${PHP_VERSION}/apache2 && \
    ln -s /etc/php/${PHP_VERSION}/default /etc/php/${PHP_VERSION}/cli

# -------------------------------
# REMOVING UNNECESSARY SHIT
# -------------------------------
RUN rm -f /etc/php/${PHP_VERSION}/default/conf.d/20-{calendar,exif,gettext,shmop,sockets,sysvmsg,sysvsem,sysvshm,mysqli,wddx,xsl}.ini

# -------------------------------
# CLEAN php.ini
# -------------------------------
RUN cp /etc/php/${PHP_VERSION}/default/php.ini /etc/php/${PHP_VERSION}/default/php.ini.dist && \
    sed -i -r '/^[\s\t]*[#;]/d' /etc/php/${PHP_VERSION}/default/php.ini && \
    sed -i -r '/^\s*$/d' /etc/php/${PHP_VERSION}/default/php.ini

# -------------------------------
# LOGS APACHE IN STDOUT
# -------------------------------
RUN rm -rf /var/www/html/* && \
    rm -rf /var/log/apache2 && \
    mkdir -m 0777 -p /var/log/apache2 && \
    ln -s /dev/stdout /var/log/apache2/access.log && \
    ln -s /dev/stdout /var/log/apache2/other_vhosts_access.log && \
    ln -s /dev/stderr /var/log/apache2/error.log && \
    echo "ServerName 127.0.0.1" >> /etc/apache2/apache2.conf

# -------------------------------
# COMPOSER
# -------------------------------
RUN curl -sSL "https://getcomposer.org/download/${COMPOSER_VERSION}/composer.phar" \
        -o /usr/local/bin/composer && \
    chmod 0755 /usr/local/bin/composer

# -------------------------------
# USER ubuntu
# -------------------------------
RUN if id -u ubuntu >/dev/null 2>&1; then userdel -r ubuntu || true; fi && \
    useradd -u 1000 -ms /bin/bash ubuntu && \
    sed -i -r 's/www-data/ubuntu/g' /etc/apache2/envvars && \
    chown -R ubuntu:ubuntu /var/log/apache2

COPY rootfs /

# -------------------------------
# XDEBUG
# -------------------------------
RUN echo "xdebug.mode=debug" > /etc/php/${PHP_VERSION}/default/conf.d/99-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /etc/php/${PHP_VERSION}/default/conf.d/99-xdebug.ini && \
    echo "xdebug.client_host=${XDEBUG_CLIENT}" >> /etc/php/${PHP_VERSION}/default/conf.d/99-xdebug.ini

# -------------------------------
# SITES CONFIG
# -------------------------------
RUN a2dissite 000-default && a2ensite 001-custom

# -------------------------------
# FINAL CLEANUP
# -------------------------------
RUN apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]
