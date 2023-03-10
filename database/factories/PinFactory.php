<?php

    namespace Jmcnelis\PinGenerator\Database\Factories;

    use Jmcnelis\PinGenerator\Models\Pin;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class PinFactory extends Factory
    {
        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = Pin::class;

        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'pin'     => '1234',
            ];
        }
    }

