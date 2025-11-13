@props(['property'])

@php
    $isModel = $property instanceof \App\Models\Property;
    $cityName = $isModel ? optional($property->city)->name : ($property->city_name ?? null);
    $district = $property->district ?? null;
    $propertyTypeName = $isModel
        ? optional($property->propertyType)->name . ($property->floor_number ? ' - ' . $property->floor_number : '')
        : ($property->property_type_name ?? null);
    $propertyTypeIcon = $isModel ? optional($property->propertyType)->icon : ($property->property_type_icon ?? 'ri-home-line');
    $area = $property->area ?? null;
    $price = $property->price ?? null;
    $serviceTypeName = $isModel ? optional($property->serviceType)->name : ($property->service_type_name ?? null);
    $detailsUrl = $isModel ? route('properties.show', $property->id) : ($property->details_url ?? '#');
    $isRent = $serviceTypeName === 'للإيجار';
@endphp

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
            <span>
                @if($cityName)
                    {{ $cityName }}
                @endif
                @if($cityName && $district)
                    -
                @endif
                @if($district)
                    {{ $district }}
                @endif
            </span>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4 text-sm text-gray-600">
            <div class="flex items-center gap-2">
                <i class="{{ $propertyTypeIcon }}"></i>
                <span>{{ $propertyTypeName }}</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="ri-ruler-line"></i>
                @if(! is_null($area))
                    <span>{{ number_format($area, 0) }} م²</span>
                @endif
            </div>
        </div>
        <div class="flex items-center justify-between">
            <div class="text-2xl font-bold text-primary">
                @if(! is_null($price))
                    {{ number_format($price, 0) }} ريال
                @endif
                @if($isRent)
                    /شهر
                @endif
            </div>
            <a href="{{ $detailsUrl }}" class="bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-blue-700 transition-colors text-sm">
                عرض التفاصيل
            </a>
        </div>
    </div>
</div>

