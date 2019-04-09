
# build stage
FROM node:lts-alpine as build-stage
WORKDIR .
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# production stage
FROM nginx:stable-alpine as production-stage
COPY --from=build-stage /dist /usr/share/nginx/html
RUN rm /etc/nginx/conf.d/default.conf
COPY app.conf /etc/nginx/conf.d/
RUN apk update
RUN apk add bash
RUN apk add npm
RUN apk add nano
RUN /bin/sh -c "apk add --no-cache bash"
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]

