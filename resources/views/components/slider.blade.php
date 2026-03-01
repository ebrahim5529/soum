@props(['sliders'])

@if($sliders && $sliders->count() > 0)
<section class="slider-container h-[600px] relative">
    @foreach($sliders as $index => $slider)
        <div class="slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ $slider->background_image_url }}'); background-size: cover; background-position: center;">
            <div class="slide-overlay absolute inset-0"></div>
            <div class="slide-content absolute inset-0 flex items-center">
                <div class="container mx-auto px-4">
                    <div class="max-w-2xl text-white">
                        <div class="flex items-center gap-2 mb-4">
                            @if($slider->badge)
                                @php
                                    $badgeClass = match($slider->badge_color) {
                                        'red' => 'bg-red-500',
                                        'green' => 'bg-green-500',
                                        'blue' => 'bg-blue-500',
                                        default => 'bg-red-500',
                                    };
                                @endphp
                                <span class="{{ $badgeClass }} text-white px-3 py-1 rounded-full text-sm">{{ $slider->badge }}</span>
                            @endif
                            <div class="flex items-center gap-1 text-sm">
                                <i class="ri-heart-line"></i>
                                <span>{{ $slider->likes_count }}</span>
                            </div>
                        </div>
                        <h1 class="text-5xl font-bold mb-4">{{ $slider->title }}</h1>
                        <div class="grid grid-cols-2 gap-4 mb-6 text-lg">
                            @if($slider->property_type)
                                <div class="flex items-center gap-2">
                                    <i class="ri-home-line"></i>
                                    <span>{{ $slider->property_type }}</span>
                                </div>
                            @endif
                            @if($slider->service_type)
                                <div class="flex items-center gap-2">
                                    <i class="ri-price-tag-3-line"></i>
                                    <span>{{ $slider->service_type }}</span>
                                </div>
                            @endif
                            @if($slider->location)
                                <div class="flex items-center gap-2">
                                    <i class="ri-map-pin-line"></i>
                                    <span>{{ $slider->location }}</span>
                                </div>
                            @endif
                            @if($slider->area)
                                <div class="flex items-center gap-2">
                                    <i class="ri-ruler-line"></i>
                                    <span>{{ $slider->area }}</span>
                                </div>
                            @endif
                        </div>
                        @if($slider->price)
                            <div class="text-4xl font-bold text-yellow-400 mb-6">
                                {{ number_format($slider->price, 0) }} ريال
                                @if($slider->price_label)
                                    {{ $slider->price_label }}
                                @endif
                            </div>
                        @endif
                        @if($slider->property_id)
                            <a href="{{ route('properties.show', $slider->property_id) }}" class="bg-primary text-white px-8 py-3 !rounded-button whitespace-nowrap hover:bg-orange-600 transition-colors text-lg inline-block">
                                عرض التفاصيل
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Navigation Controls -->
    <button id="prevSlide" class="absolute left-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
        <i class="ri-arrow-left-line text-xl"></i>
    </button>
    <button id="nextSlide" class="absolute right-6 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
        <i class="ri-arrow-right-line text-xl"></i>
    </button>

    <!-- Slide Indicators -->
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex gap-3">
        @foreach($sliders as $index => $slider)
            <button class="nav-dot w-3 h-3 rounded-full bg-white/50 {{ $index === 0 ? 'active' : '' }}"></button>
        @endforeach
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.nav-dot');
    const prevBtn = document.getElementById('prevSlide');
    const nextBtn = document.getElementById('nextSlide');
    let currentSlide = 0;
    let slideInterval;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }

    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }

    function prevSlide() {
        const prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
    }

    function startAutoSlide() {
        slideInterval = setInterval(nextSlide, 5000);
    }

    function stopAutoSlide() {
        clearInterval(slideInterval);
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            stopAutoSlide();
            startAutoSlide();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            stopAutoSlide();
            startAutoSlide();
        });
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            stopAutoSlide();
            startAutoSlide();
        });
    });

    const sliderContainer = document.querySelector('.slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', stopAutoSlide);
        sliderContainer.addEventListener('mouseleave', startAutoSlide);
    }

    if (slides.length > 0) {
        startAutoSlide();
    }
});
</script>
@endpush
@else
<section class="hero-section h-[600px] relative bg-gradient-to-br from-gray-800 to-gray-700 flex items-center justify-center">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-5xl font-bold mb-4">مرحباً بك في منصة عقار</h1>
        <p class="text-xl mb-8">منصة شاملة لإدارة وبيع العقارات</p>
    </div>
</section>
@endif
