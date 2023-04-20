<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class art extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'art';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the php artisan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $this->call('$ php artisan');
    }
}
