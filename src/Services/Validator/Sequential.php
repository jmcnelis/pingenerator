<?php

    namespace Jmcnelis\PinGenerator\Services\Validator;

    use Jmcnelis\PinGenerator\Traits\IsSequential;
    use Jmcnelis\PinGenerator\Models\Pin;

    class Sequential extends Validator
    {
        use IsSequential;

        public function applyValidation($pin)
        {

            $result = Pin::isSequential($pin);

            if($result){
                throw new \Exception('Number is sequential, which we dont want!');
            }

            return $pin;
        }

    }
