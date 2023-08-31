<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\ProductsImport; // Import the ProductsImport class
use Illuminate\Support\Facades\Bus;

class ImportProducts extends Command
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = storage_path('app/products.csv'); // Change the file path accordingly

        if (!file_exists($file)) {
            $this->error('CSV file not found.');
            return;
        }

        // Split the import into batches of 100 records
        $batches = (new ProductsImport($file))->toCollection(null, null, 100);

        foreach ($batches as $batch) {
            Bus::batch($batch)->dispatch();
        }

        $this->info('Products imported successfully in batches.');
    }
}
