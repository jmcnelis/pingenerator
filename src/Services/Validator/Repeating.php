<?php

    namespace Jmcnelis\PinGenerator\Services\Validator;

    use Jmcnelis\PinGenerator\Traits\IsRepeating;
    use Jmcnelis\PinGenerator\Models\Pin;

    class Repeating extends Validator
    {
        use IsRepeating;

        public function applyValidation($pin)
        {

            $result = Pin::isRepeating($pin);

            if($result){
                throw new \Exception('Number is repeating, which we dont want!');
            }

            return $pin;

        }

    }
