<div x-data="{ open: false }" 
     x-cloak
     @open-contact-modal.window="open = true"
     @keydown.escape.window="open = false">
    <!-- Contact Modal -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm"
         style="display: none;"
         @click.self="open = false">
        
        <div x-show="open"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
            
            <!-- Modal Header -->
            <div class="sticky top-0 bg-gradient-to-r from-primary to-blue-700 text-white p-6 rounded-t-2xl flex items-center justify-between z-10">
                <h2 class="text-2xl font-bold">تواصل معنا</h2>
                <button @click="open = false" class="text-white hover:text-gray-200 transition-colors">
                    <i class="ri-close-line text-3xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6">
                <form action="{{ route('contact.store') }}" method="POST" id="contact-modal-form" class="space-y-5" 
                      x-data="{ submitting: false }"
                      @submit="submitting = true">
                    @csrf
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                            <i class="ri-checkbox-circle-line ml-2"></i>
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(() => {
                                const modal = document.querySelector('[x-data*="open"]');
                                if (modal && modal.__x) {
                                    modal.__x.$data.open = false;
                                }
                                // Reload to clear session messages
                                window.location.reload();
                            }, 2000);
                        </script>
                    @endif
                    
                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- الاسم -->
                    <div>
                        <label for="modal-name" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="ri-user-line ml-2 text-primary"></i>
                            الاسم <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="modal-name" 
                               name="name" 
                               required
                               value="{{ old('name') }}"
                               class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg px-4 py-3 text-right hover:border-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                               placeholder="أدخل اسمك الكامل">
                    </div>

                    <!-- الجوال -->
                    <div>
                        <label for="modal-phone" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="ri-phone-line ml-2 text-primary"></i>
                            الجوال <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" 
                               id="modal-phone" 
                               name="phone" 
                               required
                               value="{{ old('phone') }}"
                               class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg px-4 py-3 text-right hover:border-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                               placeholder="05xxxxxxxx">
                    </div>

                    <!-- اسم الطلب -->
                    <div>
                        <label for="modal-subject" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="ri-file-list-line ml-2 text-primary"></i>
                            اسم الطلب <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="modal-subject" 
                               name="subject" 
                               required
                               value="{{ old('subject') }}"
                               class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg px-4 py-3 text-right hover:border-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                               placeholder="أدخل اسم الطلب">
                    </div>

                    <!-- تفاصيل الطلب -->
                    <div>
                        <label for="modal-message" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="ri-message-line ml-2 text-primary"></i>
                            تفاصيل الطلب <span class="text-red-500">*</span>
                        </label>
                        <textarea id="modal-message" 
                                  name="message" 
                                  rows="6" 
                                  required
                                  class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg px-4 py-3 text-right hover:border-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all resize-none"
                                  placeholder="اكتب تفاصيل الطلب هنا...">{{ old('message') }}</textarea>
                    </div>

                    <!-- Email (hidden, optional) -->
                    <input type="hidden" name="email" value="">

                    <!-- Buttons -->
                    <div class="flex gap-4 pt-4">
                        <button type="submit"
                                :disabled="submitting"
                                :class="submitting ? 'opacity-50 cursor-not-allowed' : ''"
                                class="flex-1 bg-primary text-white px-8 py-3 !rounded-button hover:bg-blue-700 transition-all font-semibold shadow-lg hover:shadow-xl">
                            <span x-show="!submitting">
                                <i class="ri-send-plane-line ml-2"></i>
                                إرسال
                            </span>
                            <span x-show="submitting">
                                <i class="ri-loader-4-line ml-2 animate-spin"></i>
                                جاري الإرسال...
                            </span>
                        </button>
                        <button type="button"
                                @click="open = false"
                                class="px-8 py-3 bg-gray-200 text-gray-700 !rounded-button hover:bg-gray-300 transition-all font-semibold">
                            إلغاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle form submission success
    window.addEventListener('contact-modal-success', function() {
        const modal = document.querySelector('[x-data*="open"]');
        if (modal && modal.__x) {
            modal.__x.$data.open = false;
        }
    });
</script>

