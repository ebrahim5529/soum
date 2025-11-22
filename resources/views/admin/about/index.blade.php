@php use Illuminate\Support\Str; @endphp
<x-admin>
    <x-slot:title>إدارة محتوى "من نحن"</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">إدارة محتوى "من نحن"</h2>
        <a href="{{ route('admin.about.edit') }}" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            <i class="ri-edit-line ml-2"></i>
            تعديل المحتوى
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">المحتوى الحالي</h3>
        
        <div class="space-y-6">
            <div>
                <h4 class="font-semibold text-gray-700 mb-2">المقدمة</h4>
                <p class="text-gray-600">{{ $aboutPage->introduction ?: 'لا يوجد محتوى' }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="font-semibold text-gray-700 mb-2">الرؤية</h4>
                    <h5 class="font-medium text-gray-800 mb-2">{{ $aboutPage->vision_title ?: 'لا يوجد عنوان' }}</h5>
                    <p class="text-gray-600">{{ $aboutPage->vision_content ?: 'لا يوجد محتوى' }}</p>
                </div>

                <div>
                    <h4 class="font-semibold text-gray-700 mb-2">الرسالة</h4>
                    <h5 class="font-medium text-gray-800 mb-2">{{ $aboutPage->mission_title ?: 'لا يوجد عنوان' }}</h5>
                    <p class="text-gray-600">{{ $aboutPage->mission_content ?: 'لا يوجد محتوى' }}</p>
                </div>
            </div>

            @if($aboutPage->team_description)
                <div class="mt-6">
                    <h4 class="font-semibold text-gray-700 mb-2">وصف فريقنا المتخصص</h4>
                    <p class="text-gray-600">{{ $aboutPage->team_description }}</p>
                </div>
            @endif
        </div>
    </div>

    @if($whyChooseUsItems->count() > 0)
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">عناصر "لماذا نحن؟"</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($whyChooseUsItems as $item)
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center gap-3 mb-2">
                            <i class="{{ $item->icon }} text-2xl text-primary"></i>
                            <h4 class="font-semibold text-gray-800">{{ $item->title }}</h4>
                        </div>
                        <p class="text-gray-600 text-sm">{{ Str::limit($item->description, 80) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</x-admin>

