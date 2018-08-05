<?php

namespace App\Http\Controllers;
use App\BlogCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
  {
    $this->middleware('isAdmin');
  }
  public function index()
  {
    $categories = BlogCategory::orderBy('created_at', 'desc')->paginate(20);
    return view('dashboard', compact('categories'));
  }  
}