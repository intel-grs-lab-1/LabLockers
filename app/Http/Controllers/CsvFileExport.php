<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use Maatwebsite\Excel\Facades\Excel;

class CsvFileExport extends Controller
{
    //
    public function csv_export(){
    	return Excel::download(new CSVExport, 'All-Laptops.csv');
    }
}
