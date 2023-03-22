<?php

    namespace Jmcnelis\PinGenerator\Traits;

    use Jmcnelis\PinGenerator\Models\Pin;

    trait IsRepeating
    {
        public static function isRepeating($pin){

            $digits = str_split($pin);

            $x = '';

            foreach($digits as $digit){

                if($digit == $x){
                    return true;
                }
                $x = $digit;
            }

            return false;

        }



    }
