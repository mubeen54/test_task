<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $companies = Company::paginate(10);

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');
        }

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $logoPath;
        $company->website = $request->website;

        $company->save();

        return redirect()->back()->with('success', 'Company created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);

        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);

        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        $company = Company::findOrFail($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                FileHelper::deletePublicFile($company->logo);
            }

            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');
            $company->logo = $logoPath;
        }

        $company->save();

        return redirect()->back()->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);

        if ($company->logo) {
            FileHelper::deletePublicFile($company->logo);
        }
        $company->delete();

        return redirect()->back()->with('success', 'Company deleted successfully!');
    }
    public function showCompanies()
    {
        $companies = Company::all();

        return view('employee.create', compact('companies'));
    }
}
