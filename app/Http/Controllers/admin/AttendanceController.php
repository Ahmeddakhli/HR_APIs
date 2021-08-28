<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Http\Requests\users\StoreAttendRequest;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendance=Attendance::all();
        if (count($attendance)>0) 
       return $this->success($attendance,"all attendance data");
        else
        return $this->success(null,"there is now attendance yet");
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendRequest $request)
    {
        if ( count(Attendance::find($request->attendanceable_id)->where('day', '=',$request->day)->get())>0)
         {
            return $this->error('this attendance  exist before', 401);

        }
        $request->request->add(['attendanceable_type' => 'App\Models\Employee']);
        $attendance = Attendance::create($request->all());

        return $this->success($attendance,"The attendance has been created successfully");
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAttendRequest $request, $id)
    {
        if ( count(Attendance::find($request->attendanceable_id)->where('day', '=',$request->day)->get())>0)
        {
           return $this->error('this attendance  exist before', 401);

       }
       $request->request->add(['attendanceable_type' => 'App\Models\Employee']);
    
       if($attendance= Attendance::find($id))
       {
        $attendance->update($request->all());

        return $this->success($attendance,"The attendance has been updated successfully");
       }    

           else
                return $this->error('attendance not exist', 401);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($attendance=Attendance::find($id))
        {
        $attendance->delete();
        return $this->success(null,"The attendance deleted successfully");
        }
        else
        return $this->error('attendance not exist', 401);
    }
}
