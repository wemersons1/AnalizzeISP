<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\IndexCompanyRequest;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexCompanyRequest $request)
    {
        $companies = new Company();

        if($request->corporate_name) {
            $companies = $companies->where('corporate_name', 'LIKE', '%'.$request->corporate_name.'%');
        }

        if($request->fantasy_name) {
            $companies = $companies->where('corporate_name', 'LIKE', '%'.$request->corporate_name.'%');
        }

        if($request->document) {
            $companies = $companies->where('document', 'LIKE', '%'.$request->document.'%');
        }

        if($request->email) {
            $companies = $companies->where('email', 'LIKE', '%'.$request->email.'%');
        }

        return $companies->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $validated = $request->validated();
        $company = Company::create($validated);

        return $company->refresh()->load(['addresses']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);

        if($company)
            return $company->refresh()->load(['addresses']);
        
        return response()->noContent();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, string $id)
    {
        $validated = $request->validated();
        $company = Company::find($id);
        $company->update($validated);

        return $company->refresh()->load(['addresses']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
