FROM php:7.0-fpm

RUN set -ex; \
        apt-get update; \
        apt-get install -y \
                libmcrypt-dev \
                mysql-client \
                unzip \
                libfreetype6-dev \
                libjpeg62-turbo-dev \
                libpng12-dev \
                libjpeg-dev \
                libbz2-dev \
                libgmp-dev \
                libc-client-dev \
                libkrb5-dev \
                libicu-dev \
                aspell-en \
                aspell-de \
                libxml2-dev \
                php-soap \
                libxslt-dev \
                libpq-dev \
        ; \
        rm -rf /var/lib/apt/lists/*; \
        \
        docker-php-ext-configure gd --with-freetype-dir=/usr --with-jpeg-dir=/usr --with-png-dir=/usr; \
        docker-php-ext-install -j$(nproc) gd; \
        # docker-php-ext-install json mcrypt mysqli opcache pdo_mysql bcmath mbstring zip bz2; \
        docker-php-ext-install \
                                bcmath \
                                bz2 \
                                calendar \
                                dba \
                                exif \
                                gettext \
                                gmp \
                                intl \
                                mcrypt \
                                mysqli \
                                pdo_mysql \
                                pdo_pgsql \
                                pgsql \
                                pspell \
                                soap \
                                opcache \
                                sysvmsg \
                                sysvsem \
                                sysvshm \
                                wddx \
                                xml \
                                xmlrpc \
                                zip \
                                
        ; \
        docker-php-ext-configure imap --with-kerberos --with-imap-ssl; \
        docker-php-ext-install imap; \
        pecl install -o -f xdebug \
        && rm -rf /tmp/pear \
        && echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20151012/xdebug.so" > /usr/local/etc/php/conf.d/php.ini;
# TODO consider removing the *-dev deps and only keeping the necessary lib* packages

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=2'; \
		echo 'opcache.fast_shutdown=1'; \
		echo 'opcache.enable_cli=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini
RUN { \
                echo '[xdebug]'; \
                echo 'xdebug.default_enable = 0'; \
        } >> /usr/local/etc/php/conf.d/xdebug.ini

RUN { \
        echo 'error_reporting  =  E_ALL'; \
        echo 'log_errors = On'; \
        echo 'display_errors = Off'; \
        echo 'max_execution_time = 300'; \
        echo 'max_input_vars = 16000'; \
        echo 'memory_limit = 512M'; \
        echo 'output_buffering = 4096'; \
        echo 'post_max_size = 64M'; \
        echo 'realpath_cache_size = 2M'; \
        echo 'realpath_cache_ttl = 300'; \
        echo 'upload_max_filesize = 128M'; \
    } > /usr/local/etc/php/php.ini

# CMD ["php-fpm"]
# EXPOSE 9000