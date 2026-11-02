<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $locale = $request->query('locale', 'en');
        $translations = Translation::where('locale', $locale)->pluck('value', 'key');
        return view('web', [
            'locale' => $locale,
            'translations' => $translations
        ]);
    }
}
