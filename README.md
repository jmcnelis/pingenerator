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


##  Refactoring Roadmap

After having been given some sage advice by a man much smarter than myself.

The plan is to implement the following improvements to this repo.

- Use Traits and Facades where possible
- Remove everything but routing from Controllers
- Unit Testing should only test a models expose entry points, public methods in otherwords
    - Current testing is not technically a unit test, more an integration test as we are testing UI output
- Dont nest if statements where possible
    - In this scenario where we are checking a pin meets the correct criteria that would mean replacing the if statements with a Laravel pipline
- Never leave commented out logging code in repo commits