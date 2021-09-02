FROM alpine:latest
WORKDIR /controle-estoque
COPY . .
RUN apk update && apk upgrade && \
apk add  sqlite php8-common php8 php8-session \
php8-pdo php8-pdo_sqlite php8-sqlite3 && \
rm -f /var/cache/apk/* && \
echo  "Atualizado  banco  de dados" && \
sqlite3 -column  modelo/database/loja.db -cmd '.read  modelo/database/loja.sql' 
ENTRYPOINT ["php8", "-S", "172.17.0.2:8042"]
EXPOSE 8042
