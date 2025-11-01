# AQAR - منصة إدارة العقارات

<div dir="rtl">

## حول المشروع

AQAR هي منصة إلكترونية شاملة لإدارة وبيع العقارات، تم تطويرها باستخدام Laravel 12. تتيح المنصة للمستخدمين عرض وشراء وبيع وإيجار العقارات بكفاءة وسهولة.

## المميزات الرئيسية

- 🏠 **إدارة العقارات**: إضافة وتعديل وحذف العقارات مع تفاصيل شاملة
- 🏙️ **إدارة المدن**: تنظيم العقارات حسب المدن المختلفة
- 📋 **أنواع الخدمات**: تصنيف الخدمات (بيع، شراء، إيجار، إلخ)
- 🏢 **أنواع العقارات**: تصنيف العقارات (شقق، فلل، محلات، إلخ)
- 📸 **معرض الصور**: رفع وعرض صور متعددة لكل عقار
- 🎯 **العقارات المميزة**: عرض العقارات المميزة في الصفحة الرئيسية
- 📱 **لوحة تحكم للمسؤول**: إدارة شاملة لجميع المحتويات
- 👤 **نظام المستخدمين**: تسجيل الدخول والتسجيل
- 📞 **صفحة الاتصال**: نموذج للتواصل مع الموقع
- 🎨 **واجهة عربية**: تصميم متجاوب بالكامل مع دعم اللغة العربية

## متطلبات التشغيل

- PHP >= 8.2
- Composer
- Node.js >= 18.x و npm
- SQLite أو MySQL أو PostgreSQL

## التثبيت

### 1. استنساخ المستودع
```bash
git clone [repository-url]
cd AQAR
```

### 2. تثبيت التبعيات
```bash
# تثبيت تبعيات PHP
composer install

# تثبيت تبعيات Node.js
npm install
```

### 3. إعداد البيئة
```bash
# نسخ ملف البيئة
cp .env.example .env

# إنشاء مفتاح التطبيق
php artisan key:generate
```

### 4. إعداد قاعدة البيانات

قم بتعديل ملف `.env` وإضافة إعدادات قاعدة البيانات:
```env
DB_CONNECTION=sqlite
# أو
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aqar
DB_USERNAME=root
DB_PASSWORD=
```

إذا كنت تستخدم SQLite، تأكد من وجود الملف:
```bash
touch database/database.sqlite
```

### 5. تشغيل الترحيلات والبذور
```bash
php artisan migrate
php artisan db:seed
```

### 6. بناء الأصول (Assets)
```bash
npm run build
# أو للتطوير
npm run dev
```

### 7. تشغيل المشروع
```bash
php artisan serve
```

افتح المتصفح على: `http://localhost:8000`

## البنية الأساسية للمشروع

```
AQAR/
├── app/
│   ├── Http/Controllers/    # المتحكمات
│   ├── Models/              # النماذج (Properties, Cities, Services, etc.)
│   └── View/Components/     # مكونات Blade
├── database/
│   ├── migrations/          # ترحيلات قاعدة البيانات
│   └── seeders/             # بذور البيانات
├── resources/
│   ├── views/               # ملفات Blade
│   │   ├── admin/          # لوحة تحكم المسؤول
│   │   ├── auth/           # صفحات المصادقة
│   │   └── components/     # المكونات المشتركة
│   ├── css/                # ملفات CSS
│   └── js/                 # ملفات JavaScript
├── routes/
│   └── web.php             # مسارات التطبيق
└── public/                 # الملفات العامة
```

## التقنيات المستخدمة

### Backend
- **Laravel 12**: إطار عمل PHP الحديث
- **Laravel Breeze**: نظام المصادقة
- **Eloquent ORM**: للتعامل مع قاعدة البيانات

### Frontend
- **Tailwind CSS**: إطار عمل CSS
- **Alpine.js**: مكتبة JavaScript خفيفة
- **Vite**: أداة البناء
- **Blade**: محرك القوالب

### قاعدة البيانات
- **SQLite** (افتراضي) أو **MySQL** أو **PostgreSQL**

## أوامر مفيدة

```bash
# تشغيل الخادم
php artisan serve

# تشغيل وضع التطوير (مع Vite)
npm run dev

# بناء الأصول للإنتاج
npm run build

# تشغيل الاختبارات
php artisan test

# مسح الذاكرة المؤقتة
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# إنشاء مستخدم جديد
php artisan tinker
>>> User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')])
```

## المساهمة

نرحب بمساهماتكم! يرجى اتباع الخطوات التالية:

1. Fork المشروع
2. إنشاء فرع للميزة (`git checkout -b feature/AmazingFeature`)
3. Commit التغييرات (`git commit -m 'Add some AmazingFeature'`)
4. Push إلى الفرع (`git push origin feature/AmazingFeature`)
5. فتح Pull Request

## الترخيص

هذا المشروع مرخص تحت [MIT License](https://opensource.org/licenses/MIT).

## الدعم

إذا واجهت أي مشاكل أو لديك أسئلة، يرجى فتح [issue](https://github.com/your-repo/issues) على GitHub.

---

## AQAR - Real Estate Management Platform

## About the Project

AQAR is a comprehensive digital platform for managing and selling real estate properties, built with Laravel 12. The platform allows users to browse, buy, sell, and rent properties efficiently and easily.

## Key Features

- 🏠 **Property Management**: Add, edit, and delete properties with comprehensive details
- 🏙️ **City Management**: Organize properties by different cities
- 📋 **Service Types**: Categorize services (sale, purchase, rent, etc.)
- 🏢 **Property Types**: Classify properties (apartments, villas, shops, etc.)
- 📸 **Image Gallery**: Upload and display multiple images for each property
- 🎯 **Featured Properties**: Display featured properties on the homepage
- 📱 **Admin Dashboard**: Comprehensive content management
- 👤 **User System**: Login and registration
- 📞 **Contact Page**: Contact form for the website
- 🎨 **Arabic Interface**: Fully responsive design with Arabic language support

## Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18.x and npm
- SQLite or MySQL or PostgreSQL

## Installation

### 1. Clone the repository
```bash
git clone [repository-url]
cd AQAR
```

### 2. Install dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database setup

Edit the `.env` file and add database settings:
```env
DB_CONNECTION=sqlite
# or
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aqar
DB_USERNAME=root
DB_PASSWORD=
```

If using SQLite, ensure the file exists:
```bash
touch database/database.sqlite
```

### 5. Run migrations and seeders
```bash
php artisan migrate
php artisan db:seed
```

### 6. Build assets
```bash
npm run build
# or for development
npm run dev
```

### 7. Run the project
```bash
php artisan serve
```

Open your browser at: `http://localhost:8000`

## Project Structure

```
AQAR/
├── app/
│   ├── Http/Controllers/    # Controllers
│   ├── Models/              # Models (Properties, Cities, Services, etc.)
│   └── View/Components/     # Blade Components
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/             # Database seeders
├── resources/
│   ├── views/               # Blade templates
│   │   ├── admin/          # Admin dashboard
│   │   ├── auth/           # Authentication pages
│   │   └── components/     # Shared components
│   ├── css/                # CSS files
│   └── js/                 # JavaScript files
├── routes/
│   └── web.php             # Application routes
└── public/                 # Public files
```

## Technologies Used

### Backend
- **Laravel 12**: Modern PHP framework
- **Laravel Breeze**: Authentication system
- **Eloquent ORM**: Database interaction

### Frontend
- **Tailwind CSS**: CSS framework
- **Alpine.js**: Lightweight JavaScript library
- **Vite**: Build tool
- **Blade**: Template engine

### Database
- **SQLite** (default) or **MySQL** or **PostgreSQL**

## Useful Commands

```bash
# Run the server
php artisan serve

# Run in development mode (with Vite)
npm run dev

# Build assets for production
npm run build

# Run tests
php artisan test

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Create a new user
php artisan tinker
>>> User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password')])
```

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the project
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

## Support

If you encounter any issues or have questions, please open an [issue](https://github.com/your-repo/issues) on GitHub.

</div>
