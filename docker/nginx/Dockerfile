FROM nginx:alpine

WORKDIR /var/www

COPY docker/nginx/nginx.conf /etc/nginx/
COPY docker/nginx/sites/default.conf /etc/nginx/sites-available/
COPY docker/nginx/conf.d/default.conf /etc/nginx/conf.d/

CMD ["nginx"]

EXPOSE 80 443