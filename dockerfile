FROM trafex/php-nginx

USER root
ENV PYTHONUNBUFFERED=1
RUN apk add --update --no-cache python3 py3-pip && \
    ln -sf python3 /usr/bin/python && \
    pip3 install --break-system-packages --no-cache --upgrade pip setuptools && \
    pip3 install --break-system-packages --no-cache requests 

RUN rm -r /var/www/html/*
COPY ssgProject/ /var/www/html
RUN chown -R nobody:nobody /var/www/html
USER nobody
