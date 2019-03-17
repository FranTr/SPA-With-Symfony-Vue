
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
RUN apk update && apk add bash
RUN apk update && apk add npm
RUN /bin/sh -c "apk add --no-cache bash"
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]

