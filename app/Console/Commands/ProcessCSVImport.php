<?php

namespace App\Console\Commands;

use Maatwebsite\Excel\Excel;
use Illuminate\Console\Command;
use App\Imports\ProductsImport;  

class ProcessCSVImport extends Command
{
    /**
     * Execute the console command.
     */
    protected $signature = 'import:csv {file}';
    protected $description = 'Import products from CSV';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $file = $this->argument('file');

        if (!file_exists($file)) {
            $this->error('CSV file not found.');
            return;
        }

        // Use Excel facade to import data using the ProductsImport class
        Excel::import(new ProductsImport, $file);

        $this->info('CSV import completed.');
    }

}
