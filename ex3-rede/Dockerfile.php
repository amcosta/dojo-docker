FROM nanoninja/php-fpm:7.2
RUN mkdir /app
COPY index.php /app
WORKDIR /app
ENTRYPOINT ["php", "-S", "0.0.0.0:80"]
EXPOSE 80