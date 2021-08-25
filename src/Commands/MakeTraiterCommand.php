<?php

namespace FFNLabs\Traiter\Commands;

use Illuminate\Console\Command;
use ReflectionClass;
use FFNLabs\Traiter\Helpers\ModelStubber;

class MakeTraiterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:traiter 
                        {class: The full name of the class, including namespace - separated with double-backslashes. }
                        ';

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

        $rc = new ModelStubber($class);
        if ($rc) 
        {
            $rc->generate();
            $this->info("Success!");
        } else {
            $this->error("Class not found.");
        }

    }
}
