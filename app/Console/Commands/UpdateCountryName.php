<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateCountryName extends Command
{
    // The name and signature of the console command
    protected $signature = 'students:update-country';

    // The console command description
    protected $description = 'Update "United States of America" to "USA" in the students table';

    // Execute the console command
    public function handle()
    {
        // Update country name
        $affectedRows = DB::table('students')
            ->where('country', 'United States of America')
            ->update(['country' => 'USA']);

        // Check if any rows were affected
        if ($affectedRows > 0) {
            $this->info("$affectedRows rows updated successfully.");
        } else {
            $this->info("No rows were updated.");
        }
    }
}
