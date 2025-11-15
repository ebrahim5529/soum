<x-main>
    <!-- Article Header -->
    <article class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="mb-8 text-sm text-gray-600">
                    <ol class="flex items-center gap-2">
                        <li><a href="{{ route('home') }}" class="hover:text-primary transition-colors">الرئيسية</a></li>
                        <li><i class="ri-arrow-left-line"></i></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-primary transition-colors">المدونة</a></li>
                        <li><i class="ri-arrow-left-line"></i></li>
                        <li class="text-gray-800">{{ $post->title }}</li>
                    </ol>
                </nav>

                <!-- Article Meta -->
                <div class="flex items-center gap-4 text-gray-600 mb-6">
                    <div class="flex items-center gap-2">
                        <i class="ri-calendar-line"></i>
                        <span>{{ $post->published_at->format('d M Y') }}</span>
                    </div>
                    @if($post->author)
                        <div class="flex items-center gap-2">
                            <i class="ri-user-line"></i>
                            <span>{{ $post->author->name }}</span>
                        </div>
                    @endif
                    <div class="flex items-center gap-2">
                        <i class="ri-eye-line"></i>
                        <span>{{ $post->views_count }} مشاهدة</span>
                    </div>
                </div>

                <!-- Article Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">{{ $post->title }}</h1>

                <!-- Featured Image -->
                @if($post->featured_image)
                    <div class="mb-8 rounded-2xl overflow-hidden">
                        <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
                    </div>
                @endif

                <!-- Article Content -->
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <!-- Share Buttons -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">شارك المقال</h3>
                    <div class="flex gap-4">
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="ri-twitter-x-line"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-12 h-12 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <i class="ri-whatsapp-line"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">مقالات ذات صلة</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $relatedPost)
                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                            @if($relatedPost->featured_image)
                                <a href="{{ route('blog.show', $relatedPost->slug) }}">
                                    <img src="{{ $relatedPost->featured_image }}" alt="{{ $relatedPost->title }}" class="w-full h-48 object-cover">
                                </a>
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-primary to-orange-600 flex items-center justify-center">
                                    <i class="ri-article-line text-4xl text-white opacity-50"></i>
                                </div>
                            @endif
                            
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-primary transition-colors">
                                    <a href="{{ route('blog.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a>
                                </h3>
                                
                                @if($relatedPost->excerpt)
                                    <p class="text-gray-600 mb-4 line-clamp-2 text-sm">{{ $relatedPost->excerpt }}</p>
                                @endif
                                
                                <a href="{{ route('blog.show', $relatedPost->slug) }}" 
                                   class="inline-flex items-center gap-2 text-primary font-semibold text-sm hover:gap-3 transition-all">
                                    <span>اقرأ المزيد</span>
                                    <i class="ri-arrow-left-line"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-main>

