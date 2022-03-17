<?php

namespace App\Http\Controllers;

use App\Support\CollectionPagination;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    private  $no_of_items_per_page = 2;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $employees = ['Faisal', 'Rose', 'Tina', 'Preeti', 'John', 'Adams', 'Smith', 'Marsh', 'Mitcheal'];
        $employees_collection = (new CollectionPagination($employees))->collectionPaginate($this->no_of_items_per_page);
        return view('employee-example-pagination', compact('employees_collection'));
    }
}
