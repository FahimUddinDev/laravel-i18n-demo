<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index(Request $request){
        $locale = $request->query('locale', 'en');
        if(!in_array($locale, ['en', 'bn'], true)){
            $locale='en';
        }
        $translations = Translation::query()
        ->where('locale', $locale)
        ->pluck('value', 'key');
        return response()->json([
            'locale' => $locale,
            'translations' => $translations
        ]);
    }
}
