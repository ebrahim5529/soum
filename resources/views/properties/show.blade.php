<x-main>

    @php
        $allImages = collect([['url' => $property->main_image_url, 'alt' => $property->title]]);
        foreach ($property->images as $img) {
            $allImages->push(['url' => $img->image_url, 'alt' => $property->title]);
        }
    @endphp

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Images -->
                <div>
                    <div class="rounded-2xl overflow-hidden mb-4 cursor-pointer group relative" onclick="openLightbox(0)">
                        <img src="{{ $property->main_image_url }}" alt="{{ $property->title }}" class="w-full rounded-2xl">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center rounded-2xl">
                            <i class="ri-zoom-in-line text-white text-4xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                        </div>
                        @if($allImages->count() > 1)
                            <span class="absolute bottom-3 left-3 bg-black/60 text-white text-sm px-3 py-1 rounded-full backdrop-blur-sm">
                                <i class="ri-image-line ml-1"></i> {{ $allImages->count() }} صور
                            </span>
                        @endif
                    </div>
                    @if($allImages->count() > 1)
                        <div class="grid grid-cols-4 gap-3">
                            @foreach($allImages->skip(1)->take(4)->values() as $thumbIdx => $image)
                                <div class="relative cursor-pointer group rounded-xl overflow-hidden" onclick="openLightbox({{ $thumbIdx + 1 }})">
                                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-24 object-cover rounded-xl">
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-300 rounded-xl"></div>
                                    @if($loop->last && $allImages->count() > 5)
                                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center rounded-xl">
                                            <span class="text-white text-lg font-bold">+{{ $allImages->count() - 5 }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Details -->
                <div>
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <div class="flex items-center justify-between mb-4">
                            @if($property->featured_status)
                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">{{ $property->featured_status }}</span>
                            @endif
                            <div class="flex items-center gap-1">
                                <i class="ri-heart-line text-red-500"></i>
                                <span>{{ $property->likes_count }}</span>
                            </div>
                        </div>
                        
                        <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $property->title }}</h1>
                        
                        <div class="text-4xl font-bold text-primary mb-6">
                            {{ number_format($property->price, 0) }} ريال
                            @if($property->serviceType->name === 'للإيجار')
                                /شهر
                            @endif
                        </div>

                        <div class="mb-6">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="ri-map-pin-line text-primary"></i>
                                <span>{{ $property->city->name }} - {{ $property->district }}</span>
                            </div>
                            @php
                                $address = $property->city->name . ($property->district ? ' - ' . $property->district : '') . '، السعودية';
                                $googleMapsUrl = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address);
                            @endphp
                            <a href="{{ $googleMapsUrl }}" target="_blank" rel="noopener noreferrer" 
                               class="inline-flex items-center gap-2 bg-primary text-white px-6 py-2 !rounded-button hover:bg-orange-600 transition-colors">
                                <i class="ri-map-2-line"></i>
                                <span>عرض موقع العقار على الخريطة</span>
                            </a>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center gap-2">
                                <i class="{{ $property->propertyType->icon }}"></i>
                                <span>{{ $property->propertyType->name }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="ri-ruler-line"></i>
                                <span>{{ number_format($property->area, 0) }} م²</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="ri-price-tag-3-line"></i>
                                <span>{{ $property->serviceType->name }}</span>
                            </div>
                            @if($property->bedrooms)
                                <div class="flex items-center gap-2">
                                    <i class="ri-hotel-bed-line"></i>
                                    <span>{{ $property->bedrooms }} غرف</span>
                                </div>
                            @endif
                            @if($property->bathrooms)
                                <div class="flex items-center gap-2">
                                    <i class="ri-shower-line"></i>
                                    <span>{{ $property->bathrooms }} حمامات</span>
                                </div>
                            @endif
                            @if($property->license_number)
                                <div class="flex items-center gap-2">
                                    <i class="ri-file-shield-2-line"></i>
                                    <span>رقم الترخيص: {{ $property->license_number }}</span>
                                </div>
                            @endif
                        </div>

                        @if($property->description)
                            <div class="mb-6">
                                <h3 class="text-xl font-bold mb-2">الوصف</h3>
                                <p class="text-gray-600">{{ $property->description }}</p>
                            </div>
                        @endif

                        @if($property->videos->count() > 0)
                            <div class="mb-6">
                                <h3 class="text-xl font-bold mb-4">فيديوهات العقار</h3>
                                <div class="space-y-4">
                                    @foreach($property->videos as $video)
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            @if($video->title)
                                                <h4 class="font-semibold text-gray-800 mb-2">{{ $video->title }}</h4>
                                            @endif

                                            @if($video->video_type === 'youtube')
                                                <div class="video-container">
                                                    <iframe width="100%" height="315"
                                                        src="https://www.youtube.com/embed/{{ $video->getYouTubeVideoId() }}"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen
                                                        class="rounded-lg">
                                                    </iframe>
                                                </div>
                                            @elseif($video->video_type === 'vimeo')
                                                <div class="video-container">
                                                    <iframe width="100%" height="315"
                                                        src="https://player.vimeo.com/video/{{ $video->getVimeoVideoId() }}"
                                                        frameborder="0"
                                                        allow="autoplay; fullscreen; picture-in-picture"
                                                        allowfullscreen
                                                        class="rounded-lg">
                                                    </iframe>
                                                </div>
                                            @else
                                                <div class="video-container">
                                                    <video id="video-{{ $video->id }}" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="metadata" style="width: 100%; max-height: 400px;">
                                                        <source src="{{ $video->video_url }}" type="video/mp4">
                                                        متصفحك لا يدعم تشغيل الفيديو.
                                                    </video>
                                                </div>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        videojs('video-{{ $video->id }}', {
                                                            fluid: true,
                                                            responsive: true,
                                                            playbackRates: [0.5, 1, 1.5, 2],
                                                            controlBar: {
                                                                children: [
                                                                    'playToggle',
                                                                    'progressControl',
                                                                    'volumePanel',
                                                                    'currentTimeDisplay',
                                                                    'timeDivider',
                                                                    'durationDisplay',
                                                                    'playbackRateMenuButton',
                                                                    'fullscreenToggle'
                                                                ]
                                                            }
                                                        });
                                                    });
                                                </script>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <a href="{{ route('contact') }}" class="inline-block w-full text-center bg-primary text-white px-8 py-3 !rounded-button hover:bg-orange-600 transition-colors text-lg">
                            اتصل بنا
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true" aria-label="معرض الصور">
        <div class="absolute inset-0 bg-white z-0" onclick="closeLightbox()"></div>

        <button onclick="closeLightbox()" class="absolute top-4 left-4 z-30 text-gray-500 hover:text-gray-800 transition-colors bg-gray-100 hover:bg-gray-200 rounded-full w-12 h-12 flex items-center justify-center" aria-label="إغلاق">
            <i class="ri-close-line text-2xl"></i>
        </button>

        <div class="absolute top-4 right-4 z-30 text-gray-600 bg-gray-100 rounded-full px-4 py-2 text-sm">
            <span id="lightbox-counter"></span>
        </div>

        <button id="lightbox-prev" onclick="lightboxNav(-1)" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 text-gray-500 hover:text-gray-800 transition-colors bg-gray-100 hover:bg-gray-200 rounded-full w-14 h-14 flex items-center justify-center" aria-label="السابق">
            <i class="ri-arrow-right-s-line text-3xl"></i>
        </button>
        <button id="lightbox-next" onclick="lightboxNav(1)" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 text-gray-500 hover:text-gray-800 transition-colors bg-gray-100 hover:bg-gray-200 rounded-full w-14 h-14 flex items-center justify-center" aria-label="التالي">
            <i class="ri-arrow-left-s-line text-3xl"></i>
        </button>

        <div class="absolute inset-0 z-10 flex items-center justify-center px-20 py-24" onclick="closeLightbox()">
            <img id="lightbox-img" src="" alt="" onclick="event.stopPropagation()" class="max-w-full max-h-full object-contain rounded-lg transition-opacity duration-300">
        </div>

        <div id="lightbox-thumbs" class="absolute bottom-0 left-0 right-0 z-20 bg-gray-50 border-t border-gray-200 py-3 px-4" onclick="event.stopPropagation()">
            <div class="flex gap-2 justify-center overflow-x-auto max-w-4xl mx-auto" id="lightbox-thumbs-container">
                @foreach($allImages as $index => $image)
                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" onclick="goToSlide({{ $index }})"
                         class="lightbox-thumb w-16 h-16 object-cover rounded-lg cursor-pointer border-2 border-transparent opacity-40 hover:opacity-70 transition-all duration-200 flex-shrink-0"
                         data-index="{{ $index }}">
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .lightbox-thumb.active {
            border-color: #f97316 !important;
            opacity: 1 !important;
        }
        #lightbox-thumbs-container {
            scrollbar-width: thin;
            scrollbar-color: rgba(0,0,0,0.2) transparent;
        }
        #lightbox-thumbs-container::-webkit-scrollbar {
            height: 4px;
        }
        #lightbox-thumbs-container::-webkit-scrollbar-thumb {
            background: rgba(0,0,0,0.2);
            border-radius: 2px;
        }
    </style>

    <script>
        const lightboxImages = @json($allImages->values());
        let currentIndex = 0;

        function openLightbox(index) {
            currentIndex = index;
            document.getElementById('lightbox').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            updateLightbox();
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function lightboxNav(dir) {
            currentIndex = (currentIndex + dir + lightboxImages.length) % lightboxImages.length;
            updateLightbox();
        }

        function goToSlide(index) {
            currentIndex = index;
            updateLightbox();
        }

        function updateLightbox() {
            const img = document.getElementById('lightbox-img');
            img.style.opacity = '0';
            setTimeout(() => {
                img.src = lightboxImages[currentIndex].url;
                img.alt = lightboxImages[currentIndex].alt;
                img.style.opacity = '1';
            }, 150);

            document.getElementById('lightbox-counter').textContent =
                `${currentIndex + 1} / ${lightboxImages.length}`;

            document.querySelectorAll('.lightbox-thumb').forEach(thumb => {
                thumb.classList.toggle('active', parseInt(thumb.dataset.index) === currentIndex);
            });

            const activeThumb = document.querySelector('.lightbox-thumb.active');
            if (activeThumb) {
                activeThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            }

            document.getElementById('lightbox-prev').style.display = lightboxImages.length <= 1 ? 'none' : '';
            document.getElementById('lightbox-next').style.display = lightboxImages.length <= 1 ? 'none' : '';
        }

        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');
            if (lightbox.classList.contains('hidden')) return;

            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') lightboxNav(1);
            if (e.key === 'ArrowRight') lightboxNav(-1);
        });
    </script>
</x-main>

