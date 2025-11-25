FROM ubuntu:24.04

ARG PHP_VERSION=8.4

ENV LANG=C.UTF-8
ENV LC_ALL=C.UTF-8
ENV LANGUAGE=C.UTF-8
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get autoremove -y

RUN apt-get install -y --no-install-recommends \
        git \
        zip \
        unzip \
        less \
        elvis-tiny \
        curl \
        gpg-agent \
        software-properties-common \
        supervisor && \
    add-apt-repository -y ppa:ondrej/php && \
    add-apt-repository -y ppa:ondrej/apache2 && \
    apt-get update && \
    apt-get install -y --no-install-recommends \
        php${PHP_VERSION} \
        php${PHP_VERSION}-curl \
        php${PHP_VERSION}-mbstring \
        php${PHP_VERSION}-zip \
        php${PHP_VERSION}-xdebug \
        php${PHP_VERSION}-redis \
        php${PHP_VERSION}-amqp

RUN rm -rf /etc/php/${PHP_VERSION}/cli && \
    mv /etc/php/${PHP_VERSION}/apache2 /etc/php/${PHP_VERSION}/default && \
    ln -s /etc/php/${PHP_VERSION}/default /etc/php/${PHP_VERSION}/apache2 && \
    ln -s /etc/php/${PHP_VERSION}/default /etc/php/${PHP_VERSION}/cli

RUN rm -f \
        /etc/php/${PHP_VERSION}/default/conf.d/20-calendar.ini \
        /etc/php/${PHP_VERSION}/default/conf.d/20-exif.ini \
        /etc/php/${PHP_VERSION}/default/conf.d/20-gettext.ini \
        /etc/php/${PHP_VERSION}/default/conf.d/20-shmop.ini \
        /etc/p

RUN rm -f /etc/php/${PHP_VERSION}/default/conf.d/20-{calendar,exif,gettext,shmop,sockets,sysvmsg,sysvsem,sysvshm,mysqli,wddx,xsl}.ini

# -------------------------------
# CLEAN php.ini
# -------------------------------
RUN cp /etc/php/${PHP_VERSION}/default/php.ini /etc/php/${PHP_VERSION}/default/php.ini.dist && \
    sed -i -r '/^[\s\t]*[#;]/d' /etc/php/${PHP_VERSION}/default/php.ini && \
    sed -i -r '/^\s*$/d' /etc/php/${PHP_VERSION}/default/php.ini

# COMPOSER
# -------------------------------
RUN curl -sSL "https://getcomposer.org/download/${COMPOSER_VERSION}/composer.phar" \
        -o /usr/local/bin/composer && \
    chmod 0755 /usr/local/bin/composer

# -------------------------------
# XDEBUG
# -------------------------------
RUN echo "xdebug.mode=debug" > /etc/php/${PHP_VERSION}/default/conf.d/99-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /etc/php/${PHP_VERSION}/default/conf.d/99-xdebug.ini && \
    echo "xdebug.client_host=${XDEBUG_CLIENT}" >> /etc/php/${PHP_VERSION}/default/conf.d/99-xdebug.ini


COPY rootfs /

COPY etc/supervisor/conf.d/supervisord.conf /etc/supervisor/supervisord.conf

RUN apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/*

CMD ["supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
