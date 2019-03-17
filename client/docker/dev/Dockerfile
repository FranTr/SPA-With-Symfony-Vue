FROM node:lts-alpine

RUN npm install -g http-server
WORKDIR .
COPY package*.json ./home/client/
RUN npm install
RUN apk update
RUN apk add bash
RUN apk add npm
RUN apk add nano

COPY . ./home/client/

RUN npm run build

EXPOSE 8080
CMD [ "http-server", "dist" ]
