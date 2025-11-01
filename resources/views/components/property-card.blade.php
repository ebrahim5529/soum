@props(['property'])

<div class="property-card bg-white rounded-2xl overflow-hidden shadow-lg">
    <div class="relative">
        <img src="{{ $property->main_image }}" alt="{{ $property->title }}" class="w-full h-64 object-cover object-top">
        <div class="absolute top-4 right-4 flex gap-2">
            @if($property->featured_status)
                @php
                    $badgeClass = match($property->featured_status) {
                        'جديد' => 'bg-red-500',
                        'مميز' => 'bg-green-500',
                        'استثمار' => 'bg-blue-500',
                        default => 'bg-red-500',
                    };
                @endphp
                <span class="{{ $badgeClass }} text-white px-3 py-1 rounded-full text-sm">{{ $property->featured_status }}</span>
            @endif
        </div>
        <div class="absolute top-4 left-4 flex items-center gap-1 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1">
            <i class="ri-heart-line text-red-500"></i>
            <span class="text-sm">{{ $property->likes_count }}</span>
        </div>
    </div>
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $property->title }}</h3>
        <div class="flex items-center gap-2 text-gray-600 mb-3">
            <i class="ri-map-pin-line text-primary"></i>
            <span>{{ $property->city->name }} - {{ $property->district }}</span>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4 text-sm text-gray-600">
            <div class="flex items-center gap-2">
                <i class="{{ $property->propertyType->icon }}"></i>
                <span>{{ $property->propertyType->name }}@if($property->floor_number) - {{ $property->floor_number }}@endif</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="ri-ruler-line"></i>
                <span>{{ number_format($property->area, 0) }} م²</span>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <div class="text-2xl font-bold text-primary">
                {{ number_format($property->price, 0) }} ريال
                @if($property->serviceType->name === 'للإيجار')
                    /شهر
                @endif
            </div>
            <a href="{{ route('properties.show', $property->id) }}" class="bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-blue-700 transition-colors text-sm">
                عرض التفاصيل
            </a>
        </div>
    </div>
</div>

