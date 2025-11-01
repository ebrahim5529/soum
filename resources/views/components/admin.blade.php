<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' - ' : '' }}لوحة التحكم</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white min-h-screen fixed right-0 top-0">
            <div class="p-6">
                <div class="text-2xl text-white mb-8 font-bold">لوحة التحكم</div>
                
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}">
                        <i class="ri-dashboard-line"></i>
                        <span>لوحة التحكم</span>
                    </a>
                    <a href="{{ route('admin.properties.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.properties.*') ? 'bg-primary' : '' }}">
                        <i class="ri-home-line"></i>
                        <span>العقارات</span>
                    </a>
                    <a href="{{ route('admin.sliders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.sliders.*') ? 'bg-primary' : '' }}">
                        <i class="ri-slideshow-line"></i>
                        <span>الشرائح</span>
                    </a>
                    <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-primary' : '' }}">
                        <i class="ri-service-line"></i>
                        <span>الخدمات</span>
                    </a>
                    <a href="{{ route('admin.contacts.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.contacts.*') ? 'bg-primary' : '' }}">
                        <i class="ri-mail-line"></i>
                        <span>التواصل</span>
                    </a>
                    <div class="border-t border-gray-700 my-4"></div>
                    <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="ri-global-line"></i>
                        <span>الموقع الرئيسي</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 mr-64">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm sticky top-0 z-40">
                <div class="px-6 py-4 flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-gray-800">{{ $title ?? 'لوحة التحكم' }}</h1>
                    <div class="flex items-center gap-4">
                        <span class="text-gray-600">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                <i class="ri-logout-box-line ml-2"></i>
                                تسجيل الخروج
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>

