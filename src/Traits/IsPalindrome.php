<?php

    namespace Jmcnelis\PinGenerator\Traits;

    trait IsPalindrome
    {
        public static function isPalindrome($pin){
            if($pin == strrev($pin)){ return true; }
            return false;
        }

    }
