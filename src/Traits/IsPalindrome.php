<?php

    namespace Jmcnelis\PinGenerator\Traits;

    use Jmcnelis\PinGenerator\Models\Pin;

    trait IsPalindrome
    {
        public function isPalindrome($pin){
            if($pin == strrev($pin)){ return true; }
            return false;
        }

    }
