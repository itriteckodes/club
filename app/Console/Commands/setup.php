<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;

class setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        Admin::updateOrCreate([
            'name' => 'Tritec',
            'email' => 'admin@tritec.store',
            'password' => '1234',
        ]);
        return 0;
    }
}
