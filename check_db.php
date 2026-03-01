<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== PROPERTIES ===" . PHP_EOL;
$properties = \App\Models\Property::select('id', 'image')->get();
foreach ($properties as $p) {
    $exists = $p->image ? \Illuminate\Support\Facades\Storage::disk('public')->exists($p->image) : false;
    echo "ID:{$p->id} | image:{$p->image} | exists:" . ($exists ? 'YES' : 'NO') . PHP_EOL;
}

echo PHP_EOL . "=== SLIDERS ===" . PHP_EOL;
$sliders = \App\Models\Slider::select('id', 'background_image')->get();
foreach ($sliders as $s) {
    $exists = $s->background_image ? \Illuminate\Support\Facades\Storage::disk('public')->exists($s->background_image) : false;
    echo "ID:{$s->id} | image:{$s->background_image} | exists:" . ($exists ? 'YES' : 'NO') . PHP_EOL;
}

echo PHP_EOL . "=== PROPERTY IMAGES ===" . PHP_EOL;
$images = \App\Models\PropertyImage::select('id', 'property_id', 'image_path')->get();
foreach ($images as $img) {
    $exists = $img->image_path ? \Illuminate\Support\Facades\Storage::disk('public')->exists($img->image_path) : false;
    echo "ID:{$img->id} | prop:{$img->property_id} | path:{$img->image_path} | exists:" . ($exists ? 'YES' : 'NO') . PHP_EOL;
}
