# نستخدم PHP 8.2 مع Apache
FROM php:8.2-apache

# نضيف امتدادات PHP اللي Laravel محتاجها
RUN docker-php-ext-install pdo pdo_mysql

# نفعّل rewrite في Apache
RUN a2enmod rewrite

# ننسخ ملفات المشروع
COPY . /var/www/html

# نخلي المكان اللي هيشتغل منه السيرفر
WORKDIR /var/www/html

# نضيف Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# ندي صلاحيات للـ storage و cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# نفتح البورت 80
EXPOSE 80

# نشغّل Apache
CMD ["apache2-foreground"]
