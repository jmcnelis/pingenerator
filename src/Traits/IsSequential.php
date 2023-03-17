<?php

    namespace Jmcnelis\PinGenerator\Traits;

    use Jmcnelis\PinGenerator\Models\Pin;

    trait IsSequential
    {
        public function isSequential($pin){
            $digits = str_split($pin);

            $x = '';
            foreach($digits as $digit){


                if($digit == $x){
                    return true;
                }
                $x = $digit;
                $x++;
            }

            $x = '';
            foreach($digits as $digit){

                if($digit == $x){
                    return true;
                }
                $x = $digit;
                $x--;
            }

            return false;
        }

    }
