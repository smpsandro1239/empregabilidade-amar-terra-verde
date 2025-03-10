<?php

namespace App\Http\Controllers;

class CompanyController extends Controller
{
    public function dashboard()
    {
        return view('companies.dashboard');
    }
}
