@echo off
echo Clearing Cache...
php artisan config:cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize
echo Cleared!

