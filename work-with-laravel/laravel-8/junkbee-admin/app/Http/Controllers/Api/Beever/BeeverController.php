<?php

namespace App\Http\Controllers\Api\Beever;

use App\Http\Controllers\Controller;
use App\Models\FinalOrder;
use App\Models\FinalOrderDetail;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Validator;
use App\Traits\Notification;

class BeeverController extends Controller
{
     use ApiResponser, Notification;

     public function updateLocation(Request $request)
     {
          $validator = Validator::make($request->all(), [
               'lat' =>  'required',
               'lng' =>  'required',
               'status' =>  'required',
          ]);
          if ($validator->fails()) {
               return ApiResponser::errorResponse($validator->getMessageBag(), 400);
          }

          $id = auth()->user()->id;
          $jsonString = file_get_contents('../location/location.json');
          $data = json_decode($jsonString, true);
          $collection = collect($data);
          if (is_null($collection->where('beever_id', $id)->first())) {
               $collection->add([
                    'beever_id' => $id,
                    'lat' =>  $request->lat,
                    'lng' =>  $request->lng,
                    'status' =>  $request->status,
               ]);
          } else {
               foreach ($data as $key => $value) {
                    if ($value['beever_id'] == $id) {
                         $data[$key]['lat'] = $request->lat;
                         $data[$key]['lng'] = $request->lng;
                         $data[$key]['status'] = $request->status;
                    }
               }
               $collection = $data;
          }
          $newJsonString = json_encode($collection);
          file_put_contents('location.json', $newJsonString);
          return ApiResponser::successResponse('location updated', $data = []);
     }

     public function acceptOrder(Request $request)
     {
          $validator = Validator::make($request->all(), [
               'order_code' => 'required',
          ]);
          if ($validator->fails()) {
               return ApiResponser::errorResponse($validator->getMessageBag(), 400);
          }
          $data = FinalOrder::where('order_code', $request->order_code)->update([
               'status' => 'on going'
          ]);

          $jsonString = file_get_contents('../location/location.json');
          $data = json_decode($jsonString, true);
          foreach ($data as $key => $value) {
               if ($value['beever_id'] == auth()->user()->id) {
                    $data[$key]['status'] = 'on going';
               }
          }
          $newJsonString = json_encode($data);
          file_put_contents('location.json', $newJsonString);

          $user = User::where('user_id', $data->user_id)->get();
          Notification::single($user->device_token, 'accepted', 'driver accepted!');
          return ApiResponser::successResponse('your customer location', [
               'lat' => $data->lat,
               'lng' => $data->lng,
          ]);
     }

     function confirmedOrder(Request $request)
     {
          $validator = Validator::make($request->all(), [
               'order_code' => 'required',
               'waste_weight' => 'required',
               'total_weight' => 'required',
               'subtotal' => 'required',
               'total' => 'required',
               // 'images' => 'required|image|file|mimes:png,jpg,jpeg|max:1024',
          ]);
          if ($validator->fails()) {
               return ApiResponser::errorResponse($validator->getMessageBag(), 400);
          }

          FinalOrderDetail::where('order_code', $request->order_code)->update([
               'waste_type' => $request->waste_type,
               'waste_weight' => $request->waste_weight,
               'subtotal' => $request->subtotal
          ]);

          FinalOrder::where('order_code', $request->order_code)->update([
               'driver_id' => auth()->user()->id,
               'total_weight' => $request->total_weight,
               'total' => $request->total,
               'fee_beever' => $request->fee_beever,
          ]);


          if ($files = $request->file('images')) {
               foreach ($files as $value) {
                    $imageName = time() . '-' . $value->getClientOriginalName();
                    $path = env('PUBLIC_DIR') . 'storage/order-images';
                    $value->move($path, $imageName);

                    Image::create([
                         'order_code' => $request->order_code,
                         'directory' => $imageName,
                         'user_id' => auth()->user()->id,
                         'waste_type' => $request->waste_type
                    ]);
               };
          }
          $beever = FinalOrder::where('order_code', $request->order_code)->get();
          $data = User::where('user_id', $beever->user_id)->get();
          Notification::single($data->device_token, 'acc', 'acc order!');
          return ApiResponser::successResponse('data has been created', $data->total);
     }

     public function cancelOrder(Request $request)
     {
          $bassic = FinalOrder::where('order_code', $request->order_code)->where('driver_id', auth()->user()->id);
          $bassic->update([
               'status' => 'beever_requested',
               'reason' => $request->reason
          ]);

          $data = $bassic->get();
          return ApiResponser::successResponse('data found', $data);
     }
     public function collectionHistory()
     {
          $data = FinalOrder::where('driver_id', auth()->user()->id)->latest()->filter(request(['search', 'type', 'start_date', 'finish_date']))
               ->get()
               ->map(function ($v, $i) {
                    $v->user_name = $v->user->full_name;
                    if ($v->driver_id) {
                         $v->driver_name = $v->driver->full_name;
                    }
                    if ($v->waste_collector_id) {
                         $v->waste_collector_name = $v->wastecollector->full_name;
                    }
                    return $v;
               })
               ->makeHidden(['user_id', 'driver_id', 'waste_collector_id', 'user', 'driver', 'wastecollector']);
          return ApiResponser::successResponse('data found', $data);
     }
}
