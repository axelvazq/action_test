FROM php:8.2-fpm

# Install calendar ext
RUN docker-php-ext-install calendar

# GD extension
RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

# Install imagick
RUN apt-get update -y
RUN apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN pecl install imagick
RUN docker-php-ext-enable imagick

# Install mongo db ext
RUN apt-get update -y && apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Run composer install
RUN apt-get update -y && apt-get install -y libzip-dev zip 
RUN docker-php-ext-install zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Replace policy file
COPY policy.xml /etc/ImageMagick-6/policy.xml

# Error reporting
RUN echo "error_reporting = E_ERROR" >> /usr/local/etc/php/php.ini

# Defining charset
RUN echo 'default_charset = "ISO-8859-1"' >> /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY . .

RUN composer update --no-dev --no-interaction --no-scripts

RUN composer dump-autoload