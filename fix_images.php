<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$existingImage = 'awareness-programs/kL6KmUfGMXwNdGqYhvitbQ3n39qkttF4BlPXrY14.jpg';

$updated = \App\Models\Property::whereNotNull('image')
    ->where(function ($q) {
        $q->where('image', 'NOT LIKE', '%kL6KmUf%')
          ->where('image', 'NOT LIKE', '%xeg3fed%');
    })
    ->update(['image' => $existingImage]);

echo "Updated {$updated} properties to use existing image." . PHP_EOL;
