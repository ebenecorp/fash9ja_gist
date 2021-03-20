<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

    public function edit(){
        return view('company.edit')->withCompany(Company::firstOrFail());
    }
}
