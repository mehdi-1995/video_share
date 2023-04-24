<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Sanctum\PersonalAccessToken;

class RemovedExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:remove_all { --day=7 : the members of days retains tokens }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove all expire tokens';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiration = config('sanctum.expiration');

        if ($expiration) {
            $day = $this->option('day');
            $tokens = PersonalAccessToken::where('created_at', '<', now()->subMinute($expiration + ($day * 24 * 60)));
            $tokens->delete();
            return 0;
        }

        return $this->warn('Expired Time is not set.');
    }
}
