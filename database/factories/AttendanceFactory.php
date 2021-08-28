<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day' => Carbon::today()->subDays(rand(0, 270)),
           'working_hours'=>random_int(0, 8),
            'attendanceable_type' => "App\Models\Employee",
            'attendanceable_id' => Employee::all()->random()->id,
            'status_id'=>Status::all()->random()->id,
    
           
        ];
    }
 
}
