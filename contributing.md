# How to contribute to cubeupload

Any assistance with this project is appreciated, especially in regards to implementing best practice on the Laravel framework. If you see some code we've written which you think can be done better, create a pull request!

Likewise, we'd also appreciate any other input you may have.

## Development Environment
You'll need the following installed:
* LAMP/XAMPP/MAMP development environment.
* Git utility of some description.
* Composer, for PHP dependencies.
* PHPUnit, for running unit tests.
* Node, for Elixir assets.

## Installation
*To be continued.*

## Programming Style
We don't have anything formally agreed on regarding spaces vs. tabs, curly braces on same line or new line, or many of the other typical arguments programmers have.

*To be continued.*

## Project Organisation
Laravel is an MVC framework so we follow this paradigm closely. As a reminder...
* *Models* are the data objects we use (users, images etc). 
* *Controllers* deal with basic application logic.
* *Views* are the presentation layer.

### Models
* Keep as much model-specific programming logic within models as possible.
* Anything which interacts on a model should be defined as a method within that model.
* For data querying, make use of Eloquent scopes instead of writing complicated queries in a controller.

### Views
* Keep as simple as possible, use minimal partials and logic unless there's call for extensive re-use required.

### Controllers
* Keep controllers lean. Controllers should process a request, fetch any data required and return a relevant view.
* Application logic should remain in Models if it's data related. Otherwise, use a Trait if any code re-use is needed.
