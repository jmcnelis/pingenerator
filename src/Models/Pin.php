<?php

    namespace Jmcnelis\PinGenerator\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Jmcnelis\PinGenerator\Traits\IsPalindrome;
    use Jmcnelis\PinGenerator\Traits\IsRepeating;
    use Jmcnelis\PinGenerator\Traits\IsSequential;

    class Pin extends Model
    {
        use HasFactory;
        use IsPalindrome;
        use IsRepeating;
        use IsSequential;

        protected $pin;

        // Disable Laravel's mass assignment protection
        protected $guarded = [];

        protected static function newFactory()
        {
            return \Jmcnelis\PinGenerator\Database\Factories\PinFactory::new();
        }

        public function get()
        {
            return $this->pin;
        }

        public function generate($x=4)
        {
            $this->pin = substr(str_shuffle("0123456789"), 0, $x);
            
            return $this->pin;
        }

    }
