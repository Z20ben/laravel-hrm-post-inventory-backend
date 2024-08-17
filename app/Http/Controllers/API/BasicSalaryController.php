<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasicSalaryController extends Controller
{
    //index
    public function index()
    {
        $basicSalaries = \App\Models\BasicSalary::all();
        return response([
            'message' => 'Basic salary list',
            'data' => $basicSalaries
        ],200);
    }

    //store
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'basic_salary' => 'required',
            'user_id' => 'required',
        ]);

        $user = $request->user();
        $basicSalary = new \App\Models\BasicSalary();
        $basicSalary->company_id = 1;
        $basicSalary->created_by = $request->user_id;
        $basicSalary->basic_salary = $request->basic_salary;
        $basicSalary->save();

        return response([
            'message' => 'Basic salary created',
            'data' => $basicSalary
        ], 201);
    }

    //show
    public function show($id)
    {
        $basicSalary = \App\Models\BasicSalary::find($id);
        if(!$basicSalary) {
            return response([
                'message' => 'Basic salary not found'
            ], 404);
        }

        return response([
            'message' => 'Basic salary details',
            'data' => $basicSalary
        ], 200);
    }

    //update
    public function update(Request $request, $id)
    {
        //validate request
        $request->validate([
            'basic_salary' => 'required',
            'user_id' => 'required',
        ]);

        $basicSalary = \App\Models\BasicSalary::find($id);
        if(!$basicSalary) {
            return response([
                'message' => 'Basic salary not found'
            ], 404);
        }

        $basicSalary->basic_salary = $request->basic_salary;
        $basicSalary->updated_by = $request->user_id;
        $basicSalary->save();

        return response([
            'message' => 'Basic salary updated',
            'data' => $basicSalary
        ], 200);
    }

    //destroy
    public function destroy($id){
        $basicSalary = \App\Models\BasicSalary::find($id);
        if(!$basicSalary) {
            return response([
                'message' => 'Basic salary not found'
            ], 404);
        }
        $basicSalary->delete();
        return response([
            'message' => 'Basic salary deleted'
        ], 200);
    }
}
