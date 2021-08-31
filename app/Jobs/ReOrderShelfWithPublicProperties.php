<?php

namespace App\Jobs;

use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReOrderShelfWithPublicProperties implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Shelf $shelf, public Book $dictionary)
    {
        dump('constructing ReOrderShelfWithPublicProperties');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dump('handled ReOrderShelfWithPublicProperties');
        //
    }
}
