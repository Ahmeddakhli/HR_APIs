<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\ShowrangeRequest;
use App\Http\Requests\users\ShowmonthRequest;
use App\Http\Requests\users\EmployeeAttendaanceRequest;
use App\Models\Employee;

class ReportController extends Controller
{
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeAttendaanceRequest  $request)
    {            
         // show attendance of employee by selected  id
        if($Employee=Employee::find($request->id)){

        if(count($Employee->attendances)>0)
        {

        return $this->success($Employee->attendances,"The employee has attendences");
        }
        else
        return $this->error('The employee has not attendences ', 401);
       }
        else
        return $this->error('employee not exist', 401);
        
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShowmonthRequest $request)
    {
        // show attendance of employee by selected  month
        
        if($employee=Employee::find($request->employee_id))
        {
            if (count( $employee_attendances=$employee->attendances()
            ->whereMonth('day', $request->month)->orderBy('day')->get())>0)
            {

                return $this->success($employee_attendances,"all employees data");
            }
            else
            return $this->success(null,"there is now attendances yet in this month");
         

        }
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
    public function update(ShowrangeRequest $request, $id)
    {
                // show attendance of employee Between start and end date selected

        if($employee=Employee::find($id))
        {

            if (count($employee->attendances)>0) {

              $employee_attendances= $employee->attendances() 
             ->whereBetween('day', [$request->startdate, $request->enddate])
             ->orderBy('day')->get();

                return $this->success($employee_attendances,"all employees data");


            }
             else
             return $this->success(null,"there is now attendances yet");
           

        }
        else
        return $this->error('employee not exist', 401);

        
      
    }

 
}
