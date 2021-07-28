<?php

namespace App\Helpers;

use App\Models\Preference;
use App\Models\Student;
use Illuminate\Support\Carbon;

class Values
{
    public static $fine = 100;
    
    public static function fineOnFee(){
        return Preference::find(1)->fee_fine;
    }
    
    public static function fineOnAbsent(){
        return Preference::find(1)->absent_fine;
    }

    public static function absentMessage($studentId){
        return str_replace('*STUDENTNAME*',Student::find($studentId)->name,Preference::find(1)->absent_message);
    }
}

