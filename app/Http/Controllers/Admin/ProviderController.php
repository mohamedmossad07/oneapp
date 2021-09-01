<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProvider;
use App\Models\Location;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    public function home()
    {
        return response()->view('provider.home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::with('locations')->get();
        return response()->view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProvider $request)
    {
        Provider::create($request->only(['name', 'user_name', 'email']) + ['password' => bcrypt($request->password)]);
        return redirect()->route('dashboard.admin.providers.index');
    }

    public function locations(Request $request)
    {
//        filter and organise data to be like
//        ['latitude'=>1.1,'longitude'=>22.1,'provider_id'=>1]
        $locs = $this->filterLocations($request->latitude, $request->longitude);
        Location::insert($locs);//insert multi locations in one request
        return back();
    }

    private function filterLocations($latitude, $longitude)
    {
        $locs = [];
        for ($i = 0; $i < count($latitude); $i++) {
            $locs[] = ['provider_id' => auth()->guard('provider')->user()->id, 'latitude' => $latitude[$i], 'longitude' => $longitude[$i]];
        }
        return $locs;
    }

    public function getLocationsByUserName($username)
    {
        $locations = Provider::with('locations')->where('user_name', $username)->get();
        $locations = $locations[0]->locations;
        return response()->view('provider.locations', compact('locations'));
    }
}
