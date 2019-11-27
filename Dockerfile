FROM wordpress:php7.1-apache

RUN ["chmod", "-R" , "777" , "/var/www"]
RUN ["chown", "-R" , "www-data:www-data" , "/var/www"]