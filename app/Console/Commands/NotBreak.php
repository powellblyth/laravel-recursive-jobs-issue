<?php

namespace App\Console\Commands;

use App\Jobs\ReOrderShelfWithNotPublicProperties;
use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Console\Command;

class NotBreak extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'success:it';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Interface for demonstrating the success case';

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

        $this->info('You should read the word "dispatched" after the contructor');
        ReOrderShelfWithNotPublicProperties::dispatch($shelf->id, $dictionary->id);
        $this->info('dispatched');
    }
}
