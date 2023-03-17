<?php

    namespace Jmcnelis\PinGenerator\Package\Tests\Unit;

    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Jmcnelis\PinGenerator\Tests\TestCase;
    use Jmcnelis\PinGenerator\Models\Pin;

    class PinTest extends TestCase
    {
        use RefreshDatabase;

        /** @test */
        function a_pin_exists()
        {
            $pin = Pin::factory()->create(['pin' => '1234']);
            $this->assertEquals('1234', $pin->pin);
        }
    
        /** @test */
        function is_a_palindrome()
        {
            $pin = Pin::factory()->create(['pin' => '123321']);
            $this->assertEquals(true, Pin::isPalindrome($pin->pin));
        }

        /** @test */
        function is_not_a_palindrome()
        {
            $pin = Pin::factory()->create(['pin' => '1234521']);
            $this->assertEquals(false, Pin::isPalindrome($pin->pin));
        }

        /** @test */
        function is_repeating()
        {
            $pin = Pin::factory()->create(['pin' => '123321']);
            $this->assertEquals(true, Pin::isRepeating($pin->pin));
        }

        /** @test */
        function is_not_repeating()
        {
            $pin = Pin::factory()->create(['pin' => '1234567']);
            $this->assertEquals(false, Pin::isRepeating($pin->pin));
        }

        /** @test */
        function is_sequential()
        {
            $pin = Pin::factory()->create(['pin' => '123321']);
            $this->assertEquals(true, Pin::isSequential($pin->pin));
        }

        /** @test */
        function is_not_sequential()
        {
            $pin = Pin::factory()->create(['pin' => '162595']);
            $this->assertEquals(false, Pin::isSequential($pin->pin));
        }
    }
