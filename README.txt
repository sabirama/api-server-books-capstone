put Dockerfile and .env in project or on render in secret files

----------------------------------------------------------------------------------------------------------
--Dockerfile--
----------------------------------------------------------------------------------------------------------
FROM richarvey/nginx-php-fpm:3.1.4

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

ENV APP_NAME Laravel
ENV APP_KEY {php artisan key:generate --show}
ENV APP_URL http://localhost


# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV DB_CONNECTION mysql
ENV DB_PORT 3306

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
----------------------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------------------
--.env file--
----------------------------------------------------------------------------------------------------------

ENV DB_HOST
ENV DB_DATABASE
ENV DB_USERNAME
ENV DB_PASSWORD
ENV MYSQL_ATTR_SSL_CA cacert-2023-08-22.pem

----------------------------------------------------------------------------------------------------------
