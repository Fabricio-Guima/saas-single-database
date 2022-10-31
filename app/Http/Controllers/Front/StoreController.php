<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    //está usando subdomain? entao o subdomain será o primeiro parametro
    // de todas esses seus métodos aqui
    public function index($subdomain)
    {
        dd($subdomain);
    }
}
