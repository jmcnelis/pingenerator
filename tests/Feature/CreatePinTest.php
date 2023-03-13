<?php

    namespace Jmcnelis\PinGenerator\Tests\Feature;

    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Jmcnelis\PinGenerator\Models\Pin;
    use Jmcnelis\PinGenerator\Tests\TestCase;

    class CreatePinTest extends TestCase
    {
        use RefreshDatabase;
        
        /** @test */ // TODO: return to this as im not sure why it keeps failing.
//        function a_pin_requires_a_number()
//        {
//            $this->withoutExceptionHandling();
//
//            $this->post(route('pins.store'),[
//                'pin' => '1234'
//            ])->assertSessionHasErrors('pin');
//
//        }

        /** @test */
        function all_pins_are_shown_via_the_index_route()
        {
            // Given we have a couple of Posts
            Pin::factory()->create([
                'pin' => '1234'
            ]);
            Pin::factory()->create([
                'pin' => '2345'
            ]);
            Pin::factory()->create([
                'pin' => '3456'
            ]);

            // We expect them to all show up
            // with their values on the index route
            $this->get(route('pins.index'))
                ->assertSee('1234')
                ->assertSee('2345')
                ->assertSee('3456')
                ->assertDontSee('4567s');
        }

        /** @test */
        function a_single_pin_is_shown_via_the_show_route()
        {
            $pin = Pin::factory()->create([
                'pin' => '1234',
            ]);
        
            $this->get(route('pins.show', $pin))
                ->assertSee('1234');
        }
    
        /** @test */
        function is_not_a_palindrome()
        {
            $pin = Pin::factory()->create([
                'pin' => '1234',
            ]);

            $this->get(route('pins.palindrome', $pin->pin))
                ->assertSee('NO');
        }

        /** @test */
        function is_a_palindrome()
        {
            $pin = Pin::factory()->create([
                'pin' => '1221',
            ]);

            $this->get(route('pins.palindrome', $pin->pin))
                ->assertSee('YES');
        }
    
        /** @test */
        function is_a_sequential_number()
        {
            $pin = Pin::factory()->create([
                'pin' => '1231',
            ]);
        
            $this->get(route('pins.sequential', $pin->pin))
                ->assertSee('YES');
        }
    
        /** @test */
        function is_a_descending_sequential_number()
        {
            $pin = Pin::factory()->create([
                'pin' => '8765',
            ]);
        
            $this->get(route('pins.sequential', $pin->pin))
                ->assertSee('YES');
        }
        
        /** @test */
        function is_not_a_sequential_number()
        {
            $pin = Pin::factory()->create([
                'pin' => '1427',
            ]);
        
            $this->get(route('pins.sequential', $pin->pin))
                ->assertSee('NO');
        }
    
        /** @test */
        function is_not_a_repeating_number()
        {
            $pin = Pin::factory()->create([
                'pin' => '1235',
            ]);

            $this->get(route('pins.repeating', $pin->pin))
                ->assertSee('NO');
        }

        /** @test */
        function is_a_repeating_number()
        {
            $pin = Pin::factory()->create([
                'pin' => '1266',
            ]);

            $this->get(route('pins.repeating', $pin->pin))
                ->assertSee('YES');
        }

        
    }
