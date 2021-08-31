<?php

namespace App\Jobs;

use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReOrderShelfWithNotPublicProperties implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $shelfId;
    public int $dictionaryId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $shelfId, int $dictionaryId)
    {
        dump('constructing ReOrderShelfWithNotPublicProperties');
        $this->shelfId = $shelfId;
        $this->dictionaryId = $dictionaryId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shelf = Shelf::find($this->shelfId);
        $dictionary = Book::find($this->dictionaryId);
        dump('handled ReOrderShelfWithNotPublicProperties');
    }
}
