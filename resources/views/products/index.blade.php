@extends('layouts.app') <!-- Assuming you have a layout -->

@section('content')
    <div class="container">
        <h1>Product Import</h1>
        
        <form action="{{ route('import.process') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="csv_file">Select CSV File:</label>
                <input type="file" name="csv_file" id="csv_file" accept=".csv">
            </div>
            
            <button type="submit" class="btn btn-primary">Import Products</button>
        </form>
    </div>
@endsection
