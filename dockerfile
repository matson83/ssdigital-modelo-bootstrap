FROM php:8.0-apache

# Instala extensões necessárias (exemplo: mysqli)
RUN docker-php-ext-install mysqli

# Copia os arquivos da aplicação para o diretório do Apache
COPY ./www /var/www/html

# Define permissões para o diretório da aplicação
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta do Apache
EXPOSE 80 443

# Define o comando de inicialização do container
CMD ["apache2-foreground"]
