#!/bin/bash

echo "🔧 Running Laravel cleanup and autoload fixes..."

# Rebuild Composer autoload files
composer dump-autoload

# Clear Laravel caches
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear

# Regenerate Swagger docs (if L5-Swagger is installed)
echo "📄 Regenerating Swagger docs..."
php artisan l5-swagger:generate

echo "✅ Done. Laravel is cleaned up and Swagger docs are refreshed."

php artisan serve
