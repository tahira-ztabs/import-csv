<?php

namespace App\Listeners;

use App\Events\ProductDuplicateDetected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductDuplicateNotification;

class HandleProductDuplicate implements ShouldQueue
{
    use InteractsWithQueue;
    
    /**
     * Handle the event.
     */
    public function handle(ProductDuplicateDetected $event)
    {
        $sku = $event->sku;

        // Check if a product with the same SKU exists in the database
        // Perform your database query to check for duplicates here

        if ($duplicateExists) {
            // Send email notification
            Mail::to('user@example.com')->send(new ProductDuplicateNotification($sku));
        }
    }
}
