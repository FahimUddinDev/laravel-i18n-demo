<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'welcome' => [
                'en' => 'Welcome to Laravel',
                'bn' => 'Laravel-এ স্বাগতম',
            ],
            'description' => [
                'en' => 'This is a simple multilingual project.',
                'bn' => 'এটি একটি সাধারণ বহুভাষিক প্রজেক্ট।',
            ],
            'name' => [
                'en' => 'Your Name',
                'bn' => 'তোমার নাম',
            ],
            'save' => [
                'en' => 'Save',
                'bn' => 'সংরক্ষণ করুন',
            ],
        ];
        foreach ($data as $key => $translations){
            foreach ($translations as $locale => $value){
                Translation::updateOrCreate(
                    ['key' => $key, 'locale' => $locale],
                    ['value' => $value]
                );
            }
        }
    }
}
