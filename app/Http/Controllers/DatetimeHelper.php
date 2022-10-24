<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class DatetimeHelper extends Controller
{
    public static function premiumDays($startDate){
        $fdate = $startDate ;
        $tdate= Carbon::now();;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');//now do whatever you like with $days

        return $days;
    }
}
