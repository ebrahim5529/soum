<x-main>
    <!-- Hero Banner -->
    <section class="bg-gradient-to-r from-primary to-orange-600 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">المدونة</h1>
                <p class="text-xl md:text-2xl opacity-90 leading-relaxed">
                    آخر الأخبار والمقالات العقارية
                </p>
            </div>
        </div>
    </section>

    <!-- Blog Posts -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                            @if($post->featured_image)
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
                                </a>
                            @else
                                <div class="w-full h-64 bg-gradient-to-br from-primary to-orange-600 flex items-center justify-center">
                                    <i class="ri-article-line text-6xl text-white opacity-50"></i>
                                </div>
                            @endif
                            
                            <div class="p-6">
                                <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                                    <i class="ri-calendar-line"></i>
                                    <span>{{ $post->published_at->format('d M Y') }}</span>
                                    @if($post->author)
                                        <span class="mx-2">•</span>
                                        <i class="ri-user-line"></i>
                                        <span>{{ $post->author->name }}</span>
                                    @endif
                                    <span class="mx-2">•</span>
                                    <i class="ri-eye-line"></i>
                                    <span>{{ $post->views_count }}</span>
                                </div>
                                
                                <h2 class="text-2xl font-bold text-gray-800 mb-3 hover:text-primary transition-colors">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                </h2>
                                
                                @if($post->excerpt)
                                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                                @endif
                                
                                <a href="{{ route('blog.show', $post->slug) }}" 
                                   class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
                                    <span>اقرأ المزيد</span>
                                    <i class="ri-arrow-left-line"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ri-article-line text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">لا توجد مقالات بعد</h3>
                    <p class="text-gray-600">سيتم إضافة مقالات قريباً</p>
                </div>
            @endif
        </div>
    </section>
</x-main>

