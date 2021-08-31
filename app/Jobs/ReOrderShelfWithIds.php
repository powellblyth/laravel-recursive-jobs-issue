<?php

namespace App\Jobs;

use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReOrderShelfWithIds implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $shelfId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $shelfId)
    {
        dump('constructing ReOrderShelfWithIds');
        $this->shelfId = $shelfId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shelf = Shelf::find($this->shelfId);
        dump('handled ReOrderShelfWithIds');
    }
}
