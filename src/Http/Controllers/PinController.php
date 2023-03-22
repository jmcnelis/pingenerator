<?php

    namespace Jmcnelis\PinGenerator\Http\Controllers;

    use Illuminate\Pipeline\Pipeline;
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

            $pipes = [
                \Jmcnelis\PinGenerator\Services\Validator\Palindrome::class,
                \Jmcnelis\PinGenerator\Services\Validator\Repeating::class,
                \Jmcnelis\PinGenerator\Services\Validator\Sequential::class
            ];

            try {
                
                app(Pipeline::class)
                    ->send($pin->get())
                    ->through($pipes)
                    ->thenReturn();

                $pin->create([
                    'pin'     => $pin->get(),
                ]);
                
            } catch (\Exception $exception){
                
                error_log('NUMBER IS A DUD GET OUT OF HERE WHILE YOU STILL HAVE LEGS!');

            }

            return redirect(route('pins.index'));
        }

        public function palindrome($pin){

            return view('pingenerator::pins.palindrome', ['outcome' => Pin::isPalindrome($pin)]);

        }

        public function sequential($pin){

            return view('pingenerator::pins.sequential', ['outcome' => Pin::isSequential($pin)]);

        }

        public function repeating($pin){
 
            return view('pingenerator::pins.repeating', ['outcome' => Pin::isRepeating($pin)]);
        
        }
    }
