<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuildingNumberValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
use App\Http\Resources\Trashcan as TrashcanResource;
use App\Trashcan;
use Illuminate\Http\Request;


class TrashcanController extends Controller
{
	public function list(BuildingNumberValidationRequest $request){
		$building_number_id = $request->input('building_number_id');
		$street_id = $request->input('street_id');
		if(strtolower($building_number_id) == 'bb'){
			$trashcans = Trashcan::where('sifulice', $street_id)->where('kucni_broj', '')->get();
		} else {
			$trashcans = Trashcan::where('sifulice', $street_id)->where('kucni_broj', $building_number_id)->get();
		}

		return TrashcanResource::collection($trashcans);
	}

	public function update(UpdateValidationRequest $request, $customer_id){

		$v = \Validator::make([
			'customer_id' => \Route::input('customer_id'),
		],[
			'customer_id' => 'required|numeric',
		]);

		if($v->passes() == true){
			$trash_type = $request->input('trash_type');
			$barcode_input_attribute =  'barcode_'.$trash_type;
			$rfid_input_attribute = 'rfid_'.$trash_type;
			$customer = Trashcan::where('sifra', $customer_id)->first();
			$customer->$barcode_input_attribute = $request->input('barcode');
			$customer->$rfid_input_attribute = $request->input('rfid');
			$customer->save();

			return new TrashcanResource($customer);
		} else {

			return response([
                'message' => 'The given data was invalid.',
                'errors' => 'The customer_id is invalid.',
            ]);
        }
	}
}