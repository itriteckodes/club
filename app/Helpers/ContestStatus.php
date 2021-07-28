<?php

namespace App\Helpers;

class ContestStatus{

    public static function canceled(){
        return 0;
    } 

    public static function upcoming(){
        return 1;
    } 
    
    public static function expired(){
        return 2;
    } 
}