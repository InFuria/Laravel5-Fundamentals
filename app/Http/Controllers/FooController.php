<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FooRepository;
use Illuminate\Http\Request;

class FooController extends Controller {

	public function foo(FooRepository $repository){
	    return $repository->get();
    }

}
