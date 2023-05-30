# Use an official PHP runtime as the base image
FROM php:latest

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the PHP code to the container
COPY info.php /var/www/html/

# Install the mysqli extension
RUN docker-php-ext-install mysqli

# Start PHP built-in server when the container launches
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html"]
