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
            'emotion-before' => 'required|string|max:255',
            'emotion-after' => 'required|string|max:255',
        ]);
        $validated['food'] = (int)$validated['food'];

        $record = new Record();
        $record->uid = $request->user()->id;
        $record->gid = $validated['food'];
        $record->emotion_before = $validated['emotion-before'];
        $record->emotion_after = $validated['emotion-after'];

        if ($record->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Record inserted successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to insert record',
            ]);
        }
    }
}
