<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiKey;
use App\Models\User;
use Illuminate\Support\Str;

class ApiKeySeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        if ($user) {
            ApiKey::create([
                'user_id' => $user->id,
                'name' => 'Default API Key',
                'key' => Str::random(40),
            ]);
        }
    }
}
