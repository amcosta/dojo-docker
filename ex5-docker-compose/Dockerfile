FROM nanoninja/php-fpm:7.2
RUN apt-get update
RUN apt-get install -y git wget
RUN mkdir /app
WORKDIR /app
RUN wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | php -- --quiet
COPY composer.json /app
RUN php composer.phar install
CMD ["php", "-S", "0.0.0.0:80", "public/index.php"]
EXPOSE 80
