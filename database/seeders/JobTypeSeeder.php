<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_type')->insert([
            [
                'name' => 'Internship',
                'short_desc' => 'For student who seek for work experience',
                'image' => 'assets/img/avatar/avatar-1.png'
            ],
            [
                'name' => 'Fresh Graduate',
                'short_desc' => 'For Fresh Graduate',
                'image' => 'assets/img/avatar/avatar-2.png'
            ],
            [
                'name' => 'Professional',
                'short_desc' => 'For Professional',
                'image' => 'assets/img/avatar/avatar-3.png'
            ],
        ]);

        DB::table('job_vacancy')->insert([
            'type_id' => 1,
            'title' => 'Intern',
        ]);
    }
}
