<?php

namespace App\Console\Commands;

use App\Jobs\ReOrderShelfWithPublicProperties;
use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Console\Command;

class BreakIt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'break:it';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Interface for demonstrating the problem';

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
        $shelf = new Shelf();
        $shelf->save();

        $dictionary = new Book();
        $dictionary->shelf()->associate($shelf);
        $shelf->dictionary()->associate($dictionary);

        $shelf->save();
        $dictionary->save();

        $this->info('You should read the word "dispatched" after the constructor');
        ReOrderShelfWithPublicProperties::dispatch($shelf);
        $this->info('dispatched ReOrderShelfWithPublicProperties');
    }
}
