#!/bin/bash

# ============================================
# Hostinger Deployment Script
# ============================================

echo "========================================="
echo "   AQAR - Hostinger Deployment Script"
echo "========================================="
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Function to print colored messages
print_info() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# Check if we're in the right directory
if [ ! -f "artisan" ]; then
    print_error "Please run this script from the project root directory"
    exit 1
fi

print_info "Starting deployment..."

# Step 1: Install PHP dependencies
print_info "Installing PHP dependencies..."
composer install --optimize-autoloader --no-dev --no-interaction || {
    print_error "Failed to install PHP dependencies"
    exit 1
}

# Step 2: Install Node.js dependencies
print_info "Installing Node.js dependencies..."
npm install || {
    print_error "Failed to install Node.js dependencies"
    exit 1
}

# Step 3: Build assets
print_info "Building assets..."
npm run build || {
    print_error "Failed to build assets"
    exit 1
}

# Step 4: Check if .env exists
if [ ! -f ".env" ]; then
    print_warning ".env file not found. Creating from env.hostinger.example..."
    if [ -f "env.hostinger.example" ]; then
        cp env.hostinger.example .env
        print_warning "Please update .env file with your actual configuration"
    else
        print_error "env.hostinger.example not found!"
        exit 1
    fi
fi

# Step 5: Generate application key if not set
if ! grep -q "APP_KEY=base64:" .env 2>/dev/null; then
    print_info "Generating application key..."
    php artisan key:generate --force || {
        print_error "Failed to generate application key"
        exit 1
    }
else
    print_info "Application key already exists"
fi

# Step 6: Run migrations
print_info "Running database migrations..."
php artisan migrate --force || {
    print_warning "Failed to run migrations. Please check your database configuration"
}

# Step 7: Run seeders (optional)
read -p "Do you want to run database seeders? (y/n) " -n 1 -r
echo
if [[ $REPLY =~ ^[Yy]$ ]]; then
    print_info "Running database seeders..."
    php artisan db:seed --force || {
        print_warning "Failed to run seeders"
    }
fi

# Step 8: Create storage link
print_info "Creating storage symlink..."
php artisan storage:link || {
    print_warning "Failed to create storage link"
}

# Step 9: Set permissions
print_info "Setting permissions..."
chmod -R 755 storage bootstrap/cache || {
    print_warning "Failed to set permissions"
}

# Step 10: Clear and cache config
print_info "Optimizing application..."
php artisan optimize:clear || {
    print_warning "Failed to clear cache"
}
php artisan optimize || {
    print_warning "Failed to optimize"
}
php artisan config:cache || {
    print_warning "Failed to cache config"
}
php artisan route:cache || {
    print_warning "Failed to cache routes"
}
php artisan view:cache || {
    print_warning "Failed to cache views"
}

# Step 11: Final check
print_info "Running application health check..."
php artisan about

echo ""
echo "========================================="
print_info "Deployment completed successfully!"
echo "========================================="
echo ""
print_warning "IMPORTANT: Please verify the following:"
echo "1. Update .env file with correct database credentials"
echo "2. Update APP_URL in .env to your actual domain"
echo "3. Verify file permissions for storage/ and bootstrap/cache/"
echo "4. Check that mod_rewrite is enabled in Apache"
echo ""
print_info "You can view the application at your domain"

