<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return "TODO: Retrieve a list of employees";
    }

    public function get(Request $request, $employeeId) {
        return "TODO: retrieve a employee with ID $employeeId";
    }

    public function create(Request $request) {
        return "TODO: create an user";
    }

    public function edit(Request $request, $employeeId) {
        return "TODO: Edit an user with ID $employeeId";
    }

    public function delete(Request $request, $employeeId) {
        return "TODO: Delete an user with ID $employeeId";
    }

}
