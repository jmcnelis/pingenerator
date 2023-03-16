<?php

    namespace Jmcnelis\PinGenerator\Http\Controllers;

    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Jmcnelis\PinGenerator\Models\Pin;

    class PinController extends Controller
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function index()
        {
            $pins = Pin::all();

            return view('pingenerator::pins.index', compact('pins'));
        }

        public function show()
        {
            $pin = Pin::findOrFail(request('pin'));

            return view('pingenerator::pins.show', compact('pin'));
        }

        public function store()
        {

            $pin = new Pin;
            $pin->generate();

            if($this->isNotPalindrome($pin->get())){

                if($this->isNotSequential($pin->get())){

                    if($this->isNotRepeating($pin->get())) {

                        $pin->create([
                            'pin'     => $pin->get(),
                        ]);

                    }

                }

            }
            
            return redirect(route('pins.index'));
        }

        public function isNotPalindrome($pin){

            if($pin == strrev($pin)){ return false; }

            return true;

        }

        public function palindrome($pin){

            return view('pingenerator::pins.palindrome', ['outcome' => $this->isNotPalindrome($pin)]);

        }

        public function isNotSequential($pin){

            $digits = str_split($pin);

            $x = '';
            foreach($digits as $digit){


                if($digit == $x){
                    return false;
                }
                $x = $digit;
                $x++;
            }
            
            $x = '';
            foreach($digits as $digit){
                
                if($digit == $x){
                    return false;
                }
                $x = $digit;
                $x--;
            }

            return true;

        }

        public function sequential($pin){

            return view('pingenerator::pins.sequential', ['outcome' => $this->isNotSequential($pin)]);

        }

        public function isNotRepeating($pin){

            $digits = str_split($pin);

            $x = '';
            
            foreach($digits as $digit){
                
                if($digit == $x){
                    return false;
                }
                $x = $digit;
            }


            return true;
        }

        public function repeating($pin){
 
            return view('pingenerator::pins.repeating', ['outcome' => $this->isNotRepeating($pin)]);
        
        }
    }
