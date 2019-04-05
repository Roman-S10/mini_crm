<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->paginate(10);
        return view('company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'nullable|unique:companies|string|',
            'logo' => 'nullable|image|max:1999',
            'website' => 'nullable|string',
        ]);

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileNameWithExtension = $file->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameWithExtension = $fileName . '_'. time() . '.' . $extension;
            $request->file('logo')->storeAs('public', $fileNameWithExtension);
        }else{
            $fileNameWithExtension = 'nologo.jpg';
        }
        $data['logo'] = $fileNameWithExtension;

        Company::create($data);
        return redirect('company')->with('success', 'Company created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Company $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->all();

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileNameWithExtension = $file->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameWithExtension = $fileName . '_'. time() . '.' . $extension;
            $request->file('logo')->storeAs('public', $fileNameWithExtension);
            $data['logo'] = $fileNameWithExtension;
        }

        $company->update($data);
        return redirect('company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Company $company
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        if($company->logo != 'nologo.jpg'){
            Storage::disk('public')->delete($company->logo);
        }
        $company->delete();
        return redirect('company')->with('success', 'Company deleted');
    }
}
