<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use Laravolt\Indonesia\Models\City;

class DependentDropdownController extends Controller
{
	public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function provinces()
    {
        $getprov = \Indonesia::allProvinces();

        //dd($getprov);
        return view('master.provinsi', [
            'getprov' => $getprov,
        ]);


    }

    public function kabkota(Request $request)
    {
        $getkab = \Indonesia::allCities();
        
        return view('master.kabkota',['getkab' => $getkab]);
    }

    public function cities(Request $request)
    {
     	 
       return \Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
    }

    public function districts(Request $request)
    {
        return \Indonesia::findCity($request->id, ['districts'])->districts->pluck('name', 'id');
    }

    public function villages(Request $request)
    {
        return \Indonesia::findDistrict($request->id, ['villages'])->villages->pluck('name', 'id');
    }
}
