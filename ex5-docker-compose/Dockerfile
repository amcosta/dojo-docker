FROM nanoninja/php-fpm:7.2
RUN apt-get update
RUN apt-get install -y git wget
RUN mkdir /app
ENV APP_ENV=PROD
WORKDIR /app
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
COPY . /app
#RUN php composer.phar install
EXPOSE 80 8000
