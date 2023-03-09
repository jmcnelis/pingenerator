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

//            request()->validate([
//                'pin' => 'required',
//            ]);

            $pin = new Pin;
            $pin->generate();
            error_log('> '.$pin->get());
            if($this->isNotPalindrome($pin->get())){
                error_log('IS NOT A PALINDROME CONTINUE!');

                if($this->isNotSequential($pin->get())){
                    error_log('IS NOT SEQUENTIAL CONTINUE!');

                    if($this->isNotRepeating($pin->get())) {
                        error_log('IS NOT A PALINDROME CONTINUE!');
                        
                        error_log('SAVE PIN!');
                        $pin->create([
                            'pin'     => $pin->get(),
                        ]);

                    }

                }

            }
            
            return redirect(route('pins.index'));
        }

        public function isNotPalindrome($pin){

            $digits = str_split($pin);

            if( $digits[0] != $digits[3] ){ return true; }
            if( $digits[1] != $digits[2] ){ return true; }

            //IT IS A PALINDROME
            return false;

        }

        public function palindrome($pin){

            return view('pingenerator::pins.palindrome', ['outcome' => $this->isNotPalindrome($pin)]);

        }

        public function isNotSequential($pin){

            $digits = str_split($pin);

              error_log(' ');
              error_log(print_r($digits,1));

            $x = '';
            
            foreach($digits as $digit){
        
                 error_log($x.'(x)::(digit)'.$digit);
                if($digit == $x){
                    return false;
                }
                $x = $digit;
                $x++;
            }

            return true;

        }

        public function sequential($pin){

            return view('pingenerator::pins.sequential', ['outcome' => $this->isNotSequential($pin)]);

        }

        public function isNotRepeating($pin){

            $digits = str_split($pin);

            // error_log(' ');
            // error_log(print_r($digits,1));

            $x = '';
            
            foreach($digits as $digit){

                //error_log($x.'::'.$digit);
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
