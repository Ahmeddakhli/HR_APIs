<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;
use App\Models\Employee;
use App\Http\Requests\users\EmployeeOfmonthRequest;
use App\Http\Requests\users\EmployeeOfyearRequest;
class EmployeeOfMonthController extends Controller
{
    

   

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeOfmonthRequest $request)
    {
        
        if ( count(Attendance::whereMonth('day', $request->month)->get())>0) {
            $employee = DB::table('attendances')
            ->select("attendanceable_id",DB::raw('SUM(working_hours) as month_hours'))
            ->whereMonth('day', $request->month)
            ->groupBy('attendanceable_id')
            ->orderBy('month_hours', 'desc')->first();
    
          $employeedata=Employee::find($employee->attendanceable_id);
    
            return $this->success( ["employee"=>$employeedata ,"month_hours"=>$employee->month_hours],"the  employee of month  data");
        
        }
        else
        return $this->error('month not exist', 401);

}

  

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeOfyearRequest $request, $id)
    {
        if ( count(Attendance::whereYear ('day', $request->year)->get())>0) {
            $employee = DB::table('attendances')
            ->select("attendanceable_id",DB::raw('SUM(working_hours) as year_hours'))
            ->whereYear ('day', $request->year)
            ->groupBy('attendanceable_id')
            ->orderBy('year_hours', 'desc')->first();
    
          $employeedata=Employee::find($employee->attendanceable_id);
    
            return $this->success( ["employee"=>$employeedata ,"year_hours"=>$employee->year_hours],"the  employee of month  data");
        
        }
        else
        return $this->error('year not exist', 401);
    }

}
