# Laravel CloseTo

Laravel CloseTo is a cheeky little eloquent scope to get points within a certain radius area from a given latitude or longitude based off of the Haversine formula.
## Installation
```sh
$ composer require jaejamesdev/laravelcloseto
```
## Usage
#### Basic Example:
```php
YourModel::closeTo($latitude, $longitude, $radiusInMiles);
```
The above example relies on your database having a column called 'latitude' and a column called 'longitude'. Should your database have a naming structure that is different to 'latitude' and 'longitude', no worries at all, you can use the below:
#### Advanced Example:
```php
YourModel::closeTo($latitude, $longitude, $radiusInMiles, $latiudeColumnName, $longitudeColumnName);
```
#### Ordering By Distance:
If you want to get the closest results within a radius ordered by distance, this plugin can take care of that for you in a very simple way!
```php
YourModel::closeTo($latitude, $longitude, $radiusInMiles)->orderBy('distance', 'asc');
```
## Todos
    - Add in option to convert between miles and kilometers.
    - Improve documentation.
## Issues & Requests
See [the issues section on Github!](https://github.com/jaejamesdev/laravelcloseto/issues)

## Follow Me
Why not give me a follow on [twitter?](https://twitter.com/jaejames16)
