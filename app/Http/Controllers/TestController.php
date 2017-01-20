<?php
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;

class TestController extends Controller{
    public function index(){
        return "This is Test Controller！";
    }
}