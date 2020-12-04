<?php

namespace App\Helper;

use Carbon\Carbon;

class Date
{   
    /**
     * Current Invoice Range Code
     */
    public static function invoiceRange($date)
    {
        $time = strtotime($date); #this return number of seconds allocated from date variable..
        $date = date('Y-m-d G:i', $time);  #this format the date to the format from the date method..
        $firstDay = new Carbon('first day of this month'); #this return first day of this month..
        $lastDay = new Carbon('last day of this month'); #this return last day of current month...
        $date_from = $firstDay->toDateString() . " 00:00"; #this return the year,month and date of the first day variable..
        $date_to = $lastDay->toDateString() . " 24:00"; #this return the year,month and date of the last day variable including 24 minutes with zero seconds..
        return $date > $date_from && $date < $date_to ? 1 : false;
    }

    /**
     * Optimize Invoice Range Code
    */
    public static function  reFormat($date)
    {
        $time = strtotime($date);
        $date = date('Y-m-d G:i', $time);
        $currentDay = Carbon::now(); //returns current day
        $date_from = $currentDay->firstOfMonth()->toDateString();  
        $date_to = $currentDay->lastOfMonth()->toDateString(); 
        return $date > $date_from && $date < $date_to ? true : false;
    }

}
