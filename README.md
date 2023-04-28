# Pin Generator
A simple pin generator which will generate a 4 digit pin that should meet the following criteria:

- It will not be a palindrome
- It will not be a repeating number
- It will not be a sequential number

<br>It also has some useful endpoints!

## Installation Instructions

    composer require jmcnelis/pingenerator
    php artisan vendor:publish --provider="Jmcnelis\PinGenerator\PinGeneratorServiceProvider" --tag="migrations"
    php artisan migrate
    
## Usage

After installation navigate to:

    application-url/generator/pins/

Once loaded just hit the button to start generating pins

## Endpoints
##### Will check if its a palindrome or not.
    application-url/generator/pins/palindrome/(pin here)
##### Will check if its a repeating number or not.
    application-url/generator/pins/repeating/(pin here)
##### Will check if its a sequential number or not.
    application-url/generator/pins/sequential/(pin here)
