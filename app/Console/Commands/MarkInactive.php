<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MarkInactive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:mark-inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark products as inactive when the product type is `Socks` and they were created more than 2 years ago.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('products')
            ->where('product_type', 'Socks')
            ->whereDate('created_at', '<', now()->subYears(2))
            ->update(['active' => 0]);
    }
}
