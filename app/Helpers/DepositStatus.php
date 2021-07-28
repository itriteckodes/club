<?php

namespace App\Helpers;

class DepositStatus{

    public static function pending(){
        return 0;
    } 

    public static function accepted(){
        return 1;
    } 
    
    public static function rejected(){
        return 2;
    } 
}