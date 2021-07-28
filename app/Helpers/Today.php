<?php

namespace App\Helpers;

use App\Models\Preference;
use Illuminate\Support\Carbon;

class Today
{
    public static function isFeeStartDate(){
        $startDate = Preference::find(1)->fee_start_date;
        return Carbon::today()->day($startDate) == Carbon::today()? true : false;
    }
    
    public static function isSalaryStartDate(){
        $startDate = Preference::find(1)->salary_date;
        return Carbon::today()->day($startDate) == Carbon::today()? true : false;
    }
    
    public static function afterDueDate(){
        $dueDate = Preference::find(1)->fee_due_date;
        return Carbon::today()->day($dueDate) < Carbon::today()? true : false;
    }

} 

