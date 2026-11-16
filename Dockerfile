FROM php:8.2-apache

# git is required by the admin sync panel (admin/sync.php) to check/pull updates from GitHub
RUN apt-get update \
    && apt-get install -y --no-install-recommends git \
    && rm -rf /var/lib/apt/lists/* \
    && a2enmod headers \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Block access to .git, .github and deployment files that must never be served by Apache
COPY docker/apache-security.conf /etc/apache2/conf-available/zz-security.conf
RUN a2enconf zz-security

WORKDIR /var/www/html

# Bake in a snapshot of the site so the image is runnable standalone;
# docker-compose overlays this with a live bind mount of the git checkout for the sync panel to update.
COPY . /var/www/html

RUN git config --system --add safe.directory /var/www/html \
    && chown -R www-data:www-data /var/www/html
