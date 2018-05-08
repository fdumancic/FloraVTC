<?php

namespace App\Http\Controllers;

use App\BuildingNumber;
use App\Http\Requests\NumberValidationRequest;
use App\Http\Requests\StreetValidationRequest;
use App\Place;
use App\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Place as PlaceResource;
use App\Http\Resources\Street as StreetResource;
use App\Http\Resources\BuildingNumber as BuildingNumberResource;


class AddressController extends Controller
{
	public function places(){
		$places = Place::get();

		return PlaceResource::collection($places)->groupBy('mjesto');
	}

	public function streets(StreetValidationRequest $request){
		$place_id = $request->input('place_id');
		$streets = Street::where('postanski', $place_id)->get(['naziv', 'sifra']);

		return StreetResource::collection($streets);
	}

	public function numbers(NumberValidationRequest $request){
		$street_id = $request->input('street_id');
		$numbers = BuildingNumber::where('sifulice', $street_id)->get(['kucni_broj', 'sifra']);

		return BuildingNumberResource::collection($numbers)->groupBy('kucni_broj');
	}
}