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

    }
