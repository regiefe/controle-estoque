FROM alpine:latest
RUN apk update && apk upgrade && \
apk add  sqlite php8-common php8 php8-session \
php8-pdo php8-pdo_sqlite php8-sqlite3 && \
rm -f /var/cache/apk/*
WORKDIR /controle-estoque
COPY . .
RUN sqlite3 -column  modelo/database/loja.db -cmd '.read  modelo/database/loja.sql' 
