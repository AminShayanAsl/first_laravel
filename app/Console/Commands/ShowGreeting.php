<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ShowGreeting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amin:hello {name=Hassan} {--greeting=Hi}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Amin says hello';

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
        $this->info($this->option('greeting') . ' ' . $this->argument('name'));
    }
}
