FROM alpine:latest
WORKDIR /controle-estoque
COPY . .
RUN apk update && apk upgrade && \
apk add  sqlite php84-session  \
php84-pdo php84-pdo_sqlite php84-sqlite3 && \
rm -f /var/cache/apk/* && \
echo  "Atualizado  banco  de dados" && \
sqlite3 -column  modelo/database/loja.db -cmd '.read  modelo/database/loja.sql'  ["php8", "-S", "172.17.0.2:8042"]
EXPOSE 8043
