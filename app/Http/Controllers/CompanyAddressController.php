<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyAddress\StoreCompanyAddressRequest;
use App\Http\Requests\CompanyAddress\UpdateCompanyAddressRequest;
use App\Models\CompanyAddress;
use Illuminate\Http\Request;

class CompanyAddressController extends Controller
{
    public function store(StoreCompanyAddressRequest $request)
    {
        $validated = $request->validated();
        $address = CompanyAddress::create($validated);
        
        return $address;
    }

    public function update(UpdateCompanyAddressRequest $request, string $id)
    {
        $validated = $request->validated();
        $address = CompanyAddress::find($id);

        $address->update($validated);

        return $address;
    }
}
