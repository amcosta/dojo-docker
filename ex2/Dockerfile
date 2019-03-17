FROM ubuntu:latest
RUN apt-get update
RUN apt-get install php7.2-fpm -y
RUN mkdir -p /app
WORKDIR /app
RUN touch index.php
RUN echo "<?php phpinfo();" > index.php
ENTRYPOINT ["php", "-S", "0.0.0.0:80"]
EXPOSE 80