<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Request;

class RequestSeeder extends Seeder
{

    public function run()
    {
        Request::factory()
        ->count(20)
        ->create();
    }
}
