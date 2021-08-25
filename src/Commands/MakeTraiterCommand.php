<?php

namespace FFNLabs\Traiter\Commands;

use Illuminate\Console\Command;

class MakeTraiterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:traiter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffolds out a set of traits that can be applied to a Model';

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
    public function handle(string $class)
    {
        return 0;
    }
}
