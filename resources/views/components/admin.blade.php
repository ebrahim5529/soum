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
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>
<body class="bg-gray-100 font-sans antialiased" 
      x-data="{ 
          sidebarOpen: false, 
          isDesktop: window.matchMedia('(min-width: 768px)').matches,
          init() {
              const mediaQuery = window.matchMedia('(min-width: 768px)');
              const updateDesktop = () => { this.isDesktop = mediaQuery.matches; };
              mediaQuery.addEventListener('change', updateDesktop);
          }
      }" 
      @close-sidebar.window="sidebarOpen = false">
    <div class="min-h-screen flex">
        <!-- Backdrop -->
        <div x-show="sidebarOpen && !isDesktop" 
             @click="sidebarOpen = false"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 md:hidden"
             style="display: none;"
             x-cloak>
        </div>

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white min-h-screen fixed right-0 top-0 z-50"
               :class="{
                   'block translate-x-0': sidebarOpen || isDesktop,
                   'hidden -translate-x-full': !sidebarOpen && !isDesktop
               }"
               x-transition:enter="transition ease-out duration-300 transform"
               x-transition:enter-start="translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in duration-300 transform"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="translate-x-full"
               @keydown.escape.window="!isDesktop && (sidebarOpen = false)"
               x-cloak>
            <div class="p-6">
                <div class="flex items-center justify-between mb-8">
                    <div class="text-2xl text-white font-bold">لوحة التحكم</div>
                    <button @click="sidebarOpen = false" class="md:hidden text-white hover:text-gray-300 transition-colors">
                        <i class="ri-close-line text-2xl"></i>
                    </button>
                </div>
                
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" @click="!isDesktop && (sidebarOpen = false)" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}">
                        <i class="ri-dashboard-line"></i>
                        <span>لوحة التحكم</span>
                    </a>
                    <a href="{{ route('admin.properties.index') }}" @click="!isDesktop && (sidebarOpen = false)" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.properties.*') ? 'bg-primary' : '' }}">
                        <i class="ri-home-line"></i>
                        <span>العقارات</span>
                    </a>
                    <a href="{{ route('admin.sliders.index') }}" @click="!isDesktop && (sidebarOpen = false)" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.sliders.*') ? 'bg-primary' : '' }}">
                        <i class="ri-slideshow-line"></i>
                        <span>الشرائح</span>
                    </a>
                    <a href="{{ route('admin.services.index') }}" @click="!isDesktop && (sidebarOpen = false)" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-primary' : '' }}">
                        <i class="ri-service-line"></i>
                        <span>الخدمات</span>
                    </a>
                    <a href="{{ route('admin.blog.index') }}" @click="!isDesktop && (sidebarOpen = false)" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.blog.*') ? 'bg-primary' : '' }}">
                        <i class="ri-article-line"></i>
                        <span>المدونة</span>
                    </a>
                    <a href="{{ route('admin.contacts.index') }}" @click="!isDesktop && (sidebarOpen = false)" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors {{ request()->routeIs('admin.contacts.*') ? 'bg-primary' : '' }}">
                        <i class="ri-mail-line"></i>
                        <span>التواصل</span>
                    </a>
                    <div class="border-t border-gray-700 my-4"></div>
                    <a href="{{ route('home') }}" @click="!isDesktop && (sidebarOpen = false)" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                        <i class="ri-global-line"></i>
                        <span>الموقع الرئيسي</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 w-full mr-0 md:mr-64 transition-all duration-300">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm sticky top-0 z-40">
                <div class="px-4 md:px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-600 hover:text-gray-800 transition-colors">
                            <i class="ri-menu-line text-2xl"></i>
                        </button>
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800">{{ $title ?? 'لوحة التحكم' }}</h1>
                    </div>
                    <div class="flex items-center gap-2 md:gap-4">
                        <span class="text-gray-600 text-sm md:text-base hidden sm:inline">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-3 md:px-4 py-2 rounded-lg hover:bg-red-600 transition-colors text-sm md:text-base">
                                <i class="ri-logout-box-line ml-2"></i>
                                <span class="hidden sm:inline">تسجيل الخروج</span>
                                <span class="sm:hidden">خروج</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="p-4 md:p-6">
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

