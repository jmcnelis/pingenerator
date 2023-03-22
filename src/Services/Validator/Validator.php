<?php

    namespace Jmcnelis\PinGenerator\Services\Validator;

    abstract class Validator
    {

        public function handle($pin, $next)
        {

            $this->applyValidation($pin);

            return $next($pin);
            
        }

        protected abstract function applyValidation($pin);

    }
