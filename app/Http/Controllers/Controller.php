<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // Perhatikan alias 'BaseController'

class Controller extends BaseController // Meng-extend BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}