<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CacheStudents extends Command
{
    // The name and signature of the console command
    protected $signature = 'cache:students';

    // The console command description
    protected $description = 'Cache the students data from the database';

    // Execute the console command
    public function handle()
    {
        // Fetch student records from the database
        $students = DB::table('students')->get();

        // Cache the student records using Redis for 60 minutes
        Redis::set('students', json_encode($students));
        Redis::expire('students', 3600); // Cache expiry in seconds

        $this->info('Students data cached successfully.');
    }
}
