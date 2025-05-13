<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Food;
use \App\Models\Record;
use \App\Models\User;

class RecordController extends Controller
{
    function insert(Request $request)
    {
        $validated = $request->validate([
            'food' => 'required|integer',
            'emotion_before' => 'string|max:255',
            'emotion_after' => 'string|max:255',
        ]);
        $validated['food'] = (int)$validated['food'];

        $record = new Record();
        $record->uid = $request->user()->id;
        $record->gid = $validated['food'];
        $record->emotion_before = $validated['emotion_before'];
        $record->emotion_after = $validated['emotion_after'];

        if ($record->save()) {
            return redirect()->route('dashboard.index')->with('success', 'Record created successfully');
        } else {
            return redirect()->back()->withErrors([
                'name' => 'Failed to create record',
            ]);
        }
    }
}
