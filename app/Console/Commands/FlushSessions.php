<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FlushSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all users sessions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \DB::table('sessions')->truncate();
    }
}
