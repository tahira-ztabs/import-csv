<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'title' => $row['Title'],
            'description' => $row['Description'],
            'sku' => $row['SKU'],
            'type' => $row['Type'],
            'cost_price' => $row['Cost Price'],
            'status' => $row['Publish Status'],
        ]);
    }
}
