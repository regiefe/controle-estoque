FROM php:8.0-cli

# Instala extensões necessárias
RUN apt-get update && apt-get install -y unzip zip git sqlite3

# Cria diretório da aplicação
WORKDIR /app

# Copia arquivos para dentro do container
COPY . /app

# Rodando o banco de dados
RUN sqlite3 modelo/database/loja.db < modelo/database/loja.sql

# Comando padrão do container
CMD ["php", "-S", "0.0.0.0:8042", "-t", "."]

