<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Paginated Collection

The idea and code is copied from [here](https://gist.github.com/simonhamp/549e8821946e2c40a617c85d2cf5af5e#file-appserviceprovider-php).


## Installation

Feel free to copy the most relevant code into your project. You're free to use and adapt as you need.

## Usage

There are 2 approaches.

### The `macro` way

See `AppServiceProvider.php` for a sample implementation.

### The subclass way

Where you want a "pageable" collection that is distinct from the standard `Illuminate\Support\Collection`, implement a copy of `Collection.php` in your application and simply replace your
`use Illuminate\Support\Collection` statements at the top of your dependent files with    `use App\Support\CollectionPagination`:

```php
namespace App\Http\Controllers;

use App\Support\CollectionPagination;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    private  $no_of_items_per_page = 2;

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $employees = ['Faisal', 'Rose', 'Tina', 'Preeti', 'John', 'Adams', 'Smith', 'Marsh', 'Mitcheal'];
        $employees_collection = (new CollectionPagination($employees))->collectionPaginate($this->no_of_items_per_page);
        return view('employee-example-pagination', compact('employees_collection'));
    }
}
```
**Note that this method doesn't work with the `collect()` helper function.**



