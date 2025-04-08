<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->insert([
            'group_id' => 1,
            'group_name' => 'HR',
            'group_desc' => 'HRD',
            'status' => 1
        ]);
    }
}
