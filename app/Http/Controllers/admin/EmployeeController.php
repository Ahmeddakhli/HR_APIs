<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\StoreEmployeeRequest;
use App\Http\Requests\employee\UpdateEmployeeRequest;
use App\Models\Employee;


class EmployeeController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
         if (count($employees)>0) 
        return $this->success($employees,"all employees data");
         else
         return $this->success(null,"there is now employee yet");

    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->all());

        return $this->success($employee,"The employee has been created successfully");
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          
        
        if($employee=Employee::find($id))
        return $this->success($employee,"The employee has been found successfully");
        else
        return $this->error('employee not exist', 401);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        if($employee=Employee::find($id))
        {
            
            $employee->update($request->all());

            return $this->success($employee,"The employee has been updated successfully");
        }    

            else
                 return $this->error('employee not exist', 401);
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if($Employee=Employee::find($id))
        {
        // $Employee->attendances()->detach();
        $Employee->attendances()->delete();
        $Employee->delete();
       
        return $this->success(null,"The employee has been deleted successfully");
        }
        else
        return $this->error('employee not exist', 401);

    }
}
