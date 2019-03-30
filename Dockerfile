# build stage
FROM node:lts-alpine as build-stage
WORKDIR .
COPY /client/package*.json ./client/
RUN npm install
COPY /client/ /client/
#RUN npm run build

# production stage
FROM nginx:stable-alpine as production-stage
COPY /client/dist/ /usr/share/nginx/html/
RUN rm /etc/nginx/conf.d/default.conf
COPY /client/app.conf /etc/nginx/conf.d/
RUN apk update
RUN apk add bash
RUN apk add npm
RUN apk add nano
RUN /bin/sh -c "apk add --no-cache bash"
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]

FROM traefik:alpine
FROM thecodingmachine/php:7.2-v2-apache-node10
FROM mysql:5.7
FROM phpmyadmin/phpmyadmin:4.7