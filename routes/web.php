<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/images/{path}', [StorageController::class, 'show'])->where('path', '.*')->name('images.show');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'storeContact'])->name('contact.store');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('properties', App\Http\Controllers\Admin\PropertyController::class);
    Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('blog', App\Http\Controllers\Admin\BlogPostController::class);
    Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class)->except(['create', 'store', 'edit', 'update']);
    Route::post('contacts/{contact}/mark-read', [App\Http\Controllers\Admin\ContactController::class, 'markAsRead'])->name('contacts.mark-read');
    Route::post('contacts/{contact}/mark-unread', [App\Http\Controllers\Admin\ContactController::class, 'markAsUnread'])->name('contacts.mark-unread');
    
    // About Page Management
    Route::get('about', [App\Http\Controllers\Admin\AboutPageController::class, 'index'])->name('about.index');
    Route::get('about/edit', [App\Http\Controllers\Admin\AboutPageController::class, 'edit'])->name('about.edit');
    Route::put('about', [App\Http\Controllers\Admin\AboutPageController::class, 'update'])->name('about.update');
    
    // Statistics Management
    Route::get('statistics', [App\Http\Controllers\Admin\StatisticController::class, 'index'])->name('statistics.index');
    Route::get('statistics/{statistic}/edit', [App\Http\Controllers\Admin\StatisticController::class, 'edit'])->name('statistics.edit');
    Route::put('statistics/{statistic}', [App\Http\Controllers\Admin\StatisticController::class, 'update'])->name('statistics.update');
    
    // Why Choose Us Management
    Route::resource('why-choose-us', App\Http\Controllers\Admin\WhyChooseUsItemController::class)->parameters([
        'why-choose-us' => 'why_choose_u'
    ]);
    
    // Property Types Management
    Route::resource('property-types', App\Http\Controllers\Admin\PropertyTypeController::class);
    
    // Service Types Management
    Route::resource('service-types', App\Http\Controllers\Admin\ServiceTypeController::class);
    
    // Contact Settings Management
    Route::get('contact-settings', [App\Http\Controllers\Admin\ContactSettingController::class, 'index'])->name('contact-settings.index');
    Route::put('contact-settings', [App\Http\Controllers\Admin\ContactSettingController::class, 'update'])->name('contact-settings.update');
});

// Keep the old dashboard route for compatibility
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
