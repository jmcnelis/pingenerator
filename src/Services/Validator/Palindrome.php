<?php

    namespace Jmcnelis\PinGenerator\Services\Validator;

    use Jmcnelis\PinGenerator\Traits\IsPalindrome;
    use Jmcnelis\PinGenerator\Models\Pin;


    class Palindrome extends Validator
    {
        use IsPalindrome;

        public function applyValidation($pin)
        {

            $result = Pin::isPalindrome($pin);

            if($result){
                throw new \Exception('Number is a palindrome, which we dont want!');
            }
    
            return $pin;
        }

        
    }
