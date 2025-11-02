# ============================================
# Hostinger Deployment Script for Windows
# ============================================

Write-Host "=========================================" -ForegroundColor Cyan
Write-Host "   AQAR - Hostinger Deployment Script" -ForegroundColor Cyan
Write-Host "=========================================" -ForegroundColor Cyan
Write-Host ""

# Check if we're in the right directory
if (-not (Test-Path "artisan")) {
    Write-Host "[ERROR] Please run this script from the project root directory" -ForegroundColor Red
    exit 1
}

Write-Host "[INFO] Starting deployment..." -ForegroundColor Green

# Step 1: Install PHP dependencies
Write-Host "[INFO] Installing PHP dependencies..." -ForegroundColor Green
composer install --optimize-autoloader --no-dev --no-interaction
if ($LASTEXITCODE -ne 0) {
    Write-Host "[ERROR] Failed to install PHP dependencies" -ForegroundColor Red
    exit 1
}

# Step 2: Install Node.js dependencies
Write-Host "[INFO] Installing Node.js dependencies..." -ForegroundColor Green
npm install
if ($LASTEXITCODE -ne 0) {
    Write-Host "[ERROR] Failed to install Node.js dependencies" -ForegroundColor Red
    exit 1
}

# Step 3: Build assets
Write-Host "[INFO] Building assets..." -ForegroundColor Green
npm run build
if ($LASTEXITCODE -ne 0) {
    Write-Host "[ERROR] Failed to build assets" -ForegroundColor Red
    exit 1
}

# Step 4: Check if .env exists
if (-not (Test-Path ".env")) {
    Write-Host "[WARNING] .env file not found. Creating from env.hostinger.example..." -ForegroundColor Yellow
    if (Test-Path "env.hostinger.example") {
        Copy-Item "env.hostinger.example" ".env"
        Write-Host "[WARNING] Please update .env file with your actual configuration" -ForegroundColor Yellow
    } else {
        Write-Host "[ERROR] env.hostinger.example not found!" -ForegroundColor Red
        exit 1
    }
}

# Step 5: Generate application key if not set
$envContent = Get-Content ".env" -Raw
if ($envContent -notmatch "APP_KEY=base64:") {
    Write-Host "[INFO] Generating application key..." -ForegroundColor Green
    php artisan key:generate --force
    if ($LASTEXITCODE -ne 0) {
        Write-Host "[ERROR] Failed to generate application key" -ForegroundColor Red
        exit 1
    }
} else {
    Write-Host "[INFO] Application key already exists" -ForegroundColor Green
}

# Step 6: Run migrations
Write-Host "[INFO] Running database migrations..." -ForegroundColor Green
php artisan migrate --force
if ($LASTEXITCODE -ne 0) {
    Write-Host "[WARNING] Failed to run migrations. Please check your database configuration" -ForegroundColor Yellow
}

# Step 7: Run seeders (optional)
$runSeeders = Read-Host "Do you want to run database seeders? (y/n)"
if ($runSeeders -eq "y" -or $runSeeders -eq "Y") {
    Write-Host "[INFO] Running database seeders..." -ForegroundColor Green
    php artisan db:seed --force
    if ($LASTEXITCODE -ne 0) {
        Write-Host "[WARNING] Failed to run seeders" -ForegroundColor Yellow
    }
}

# Step 8: Create storage link
Write-Host "[INFO] Creating storage symlink..." -ForegroundColor Green
php artisan storage:link
if ($LASTEXITCODE -ne 0) {
    Write-Host "[WARNING] Failed to create storage link" -ForegroundColor Yellow
}

# Step 9: Clear and cache config
Write-Host "[INFO] Optimizing application..." -ForegroundColor Green
php artisan optimize:clear
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Step 10: Final check
Write-Host "[INFO] Running application health check..." -ForegroundColor Green
php artisan about

Write-Host ""
Write-Host "=========================================" -ForegroundColor Cyan
Write-Host "[INFO] Deployment completed successfully!" -ForegroundColor Green
Write-Host "=========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "[WARNING] IMPORTANT: Please verify the following:" -ForegroundColor Yellow
Write-Host "1. Update .env file with correct database credentials"
Write-Host "2. Update APP_URL in .env to your actual domain"
Write-Host "3. Verify file permissions for storage/ and bootstrap/cache/"
Write-Host "4. Check that mod_rewrite is enabled in Apache"
Write-Host ""
Write-Host "[INFO] You can view the application at your domain" -ForegroundColor Green

