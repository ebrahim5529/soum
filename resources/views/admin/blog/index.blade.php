<x-admin>
    <x-slot:title>إدارة المدونة</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">إدارة المدونة</h2>
        <a href="{{ route('admin.blog.create') }}" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition-colors">
            <i class="ri-add-line ml-2"></i>
            إضافة مقال جديد
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الصورة</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">العنوان</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">المؤلف</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الحالة</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">تاريخ النشر</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">المشاهدات</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-6">
                                @if($post->featured_image)
                                    <img src="{{ $post->featured_image }}" 
                                         alt="{{ $post->title }}" 
                                         class="w-16 h-16 object-cover rounded-lg">
                                @else
                                    <div class="w-16 h-16 bg-gradient-to-br from-primary to-orange-600 rounded-lg flex items-center justify-center">
                                        <i class="ri-article-line text-white text-2xl"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-800">{{ $post->title }}</div>
                                @if($post->excerpt)
                                    <div class="text-sm text-gray-500 mt-1 line-clamp-1">{{ Str::limit($post->excerpt, 50) }}</div>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">{{ $post->author->name ?? 'غير محدد' }}</span>
                            </td>
                            <td class="py-4 px-6">
                                @if($post->is_published)
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">منشور</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">مسودة</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if($post->published_at)
                                    <span class="text-gray-700">{{ $post->published_at->format('Y-m-d') }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">{{ $post->views_count }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="text-blue-500 hover:text-blue-700" title="عرض">
                                        <i class="ri-eye-line text-xl"></i>
                                    </a>
                                    <a href="{{ route('admin.blog.edit', $post) }}" class="text-primary hover:text-orange-600" title="تعديل">
                                        <i class="ri-edit-line text-xl"></i>
                                    </a>
                                    <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" title="حذف">
                                            <i class="ri-delete-bin-line text-xl"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-500">
                                <i class="ri-article-line text-4xl mb-4 block"></i>
                                لا توجد مقالات
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $posts->links() }}
        </div>
    </div>
</x-admin>

