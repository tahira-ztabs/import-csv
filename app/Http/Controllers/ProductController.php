<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\Bus;
use App\Console\Commands\ProcessCSVImport;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('import-products');
    }

    public function processImport(Request $request)
    {
        // Validate the uploaded file (e.g., max file size, file type)

        $file = $request->file('csv_file');

        // Dispatch the CSV import command to the queue
        Bus::dispatch(new ProcessCSVImport($file));

        return redirect()->route('import-products')->with('success', 'Import started. Products will be imported in the background.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
