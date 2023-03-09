<?php

    namespace Jmcnelis\PinGenerator\Tests;

    use Jmcnelis\PinGenerator\PinGeneratorServiceProvider;

    class TestCase extends \Orchestra\Testbench\TestCase
    {
        public function setUp(): void
        {
            parent::setUp();
            // additional setup
        }

        protected function getPackageProviders($app)
        {
            return [
                PinGeneratorServiceProvider::class,
            ];
        }
        
        public function getEnvironmentSetUp($app)
        {
            include_once __DIR__ . '/../database/migrations/create_pins_table.php.stub';

            // run the up() method (perform the migration)
            (new \CreatePinsTable)->up();
        }
    }
