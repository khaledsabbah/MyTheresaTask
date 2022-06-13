# Fix Storage Permessions
chmod 755 -R storage/logs/
chmod 777 -R storage/framework/sessions/
chmod 777 -R storage/framework/views/
chmod 777 -R storage/framework/cache/
chmod 777 -R bootstrap/cache/

# Optmize Application
php artisan optimize:clear
