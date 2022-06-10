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
        $this->validateEmployee($request);

        $employee = new Employee([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name')
        ]);

        $employee->save();

        return response()->json($employee);
    }

    public function get(Request $request, $employeeId) {
        $employee = Employee::find($employeeId);
        if (!$employee) return response([ 'message' => 'This employee does not exist' ], 404);

        return response()->json($employee);
    }

    public function update(Request $request, $employeeId) {
        $this->validateEmployee($request);

        $employee = Employee::find($employeeId);
        if (!$employee) return response([ 'message' => 'This employee does not exist' ], 404);

        $employee->name = $request->input('name');
        $employee->last_name = $request->input('last_name');

        $employee->save();

        return response()->json($employee);
    }

    public function delete(Request $request, $employeeId) {
        $employee = Employee::find($employeeId);
        if (!$employee) return response([ 'message' => 'This employee does not exist' ], 404);

        $employee->delete();

        return response()->json('Employee deleted');
    }

    public function validateEmployee(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'last_name' => 'required|string'
        ]);
    }

}
