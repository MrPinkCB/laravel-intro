<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CompanyController extends Controller
{
    //Retrieve list of all companies, pass to view
    public function index()
    {
        $companies = \App\Models\Company::all()->sortBy("company");//sortByDesc
        //dd($companies);
        return view('companies.index')->with('companies', $companies);//->withCompanies($companies)
    }

    //show view to add new company
    public function create()
    {
        //dd('create');
        return view('companies.create');
    }

    //validate our input, insert into DB, redirect to index
    public function store(Request $request)
    {
        //dd('store');
        $rules = [
            'company' => 'required|max:50|unique:companies,company'
        ];
        $validator = $this->validate($request, $rules);

        $company = new \App\Models\Company;
        $company->company = $request->company;
        $company->save();

        Session::flash('success', 'A new company has been added to the database');
        return redirect()->route('companies.index');
    }

    //Retrieve single company using $id, pass to show view
    public function show($id)
    {
        dd('show');
    }

    //Retrieve single company using $id, pass to edit view
    public function edit($id)
    {
        //dd('edit');
        $company = \App\Models\Company::find($id);
        if ($company != null) {
            return view('companies.edit')->with('company', $company);
        } else {
            Session::flash('error', 'company not found');
            return redirect()->route('companies.index');
        }
    }

    //validate our input, update $id record in DB, redirect to index
    public function update(Request $request, $id)
    {
        //dd('update');
        $rules = [
            'company' => 'required|max:50|unique:companies,company,'.$id
        ];
        $validator = $this->validate($request, $rules);

        $company = \App\Models\Company::find($id);
        if ($company != null) {
            $company->company = $request->company;
            $company->save();
    
            Session::flash('success', $company->company.' has been updated');    
        } else {
            Session::flash('error', 'company not found');
        }
        return redirect()->route('companies.index');
    }

    //Retrieve single company using $id, delete from DB, redirect to index
    public function destroy($id)
    {
        //dd('destroy');
        $company = \App\Models\Company::find($id);
        if ($company != null) {
            $company_name = $company->company;
            $company->delete();
    
            Session::flash('success', $company_name.' has been deleted');    
        } else {
            Session::flash('error', 'company not found');
        }
        return redirect()->route('companies.index');
    }
}
