<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    function switchLanguage(Request $request, $locale)
    {
        // Validate the locale
        if (!in_array($locale, ['en', 'id', 'jp'])) {
            abort(404);
        }

        // Set the locale in the session
        session(['app_locale' => $locale]);

        // Redirect back to the previous page
        return redirect()->back();
    }
}
