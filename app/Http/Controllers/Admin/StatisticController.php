<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('order')->get();

        return view('admin.statistics.index', compact('statistics'));
    }

    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    public function update(Request $request, Statistic $statistic)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
        ]);

        $statistic->update($validated);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'تم تحديث الإنجاز بنجاح');
    }
}
