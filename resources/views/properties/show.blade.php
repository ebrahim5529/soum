<x-main>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Images -->
                <div>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg mb-4">
                        <img src="{{ $property->main_image_url }}" alt="{{ $property->title }}" class="w-full h-96 object-cover">
                    </div>
                    @if($property->images->count() > 0)
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($property->images->take(4) as $image)
                                <img src="{{ $image->image_url }}" alt="{{ $property->title }}" class="w-full h-24 object-cover rounded-lg">
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
</x-main>

