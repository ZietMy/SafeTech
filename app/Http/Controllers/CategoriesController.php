<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categories;
    public function __construct()
    {
        $this->categories = new Categories();

    }
    
}
