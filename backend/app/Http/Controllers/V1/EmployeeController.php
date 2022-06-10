<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function list() {
        $employees = Employee::all();

        return response()->json($employees);
    }

    public function create(Request $request) {
        return "TODO: create an user";
    }

    public function get(Request $request, $employeeId) {
        return "TODO: retrieve a employee with ID $employeeId";
    }

    public function edit(Request $request, $employeeId) {
        return "TODO: Edit an user with ID $employeeId";
    }

    public function delete(Request $request, $employeeId) {
        return "TODO: Delete an user with ID $employeeId";
    }

}
