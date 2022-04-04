<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\FeedBack;
use App\Models\FinalOrder;
use App\Models\FinalOrderDetail;
use App\Models\Image;
use App\Models\Rate;
use App\Models\User;
use App\Models\Waste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponser;
use App\Traits\DistanceBetweenTwoAddresses;
use App\Traits\Notification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;


class UserController extends Controller
{
    use ApiResponser, DistanceBetweenTwoAddresses, Notification;

    public function getUserAuth()
    {
        $data = auth()->user();
        return ApiResponser::successResponse('data found', $data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:4',
            'address' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return ApiResponser::errorResponse($validator->getMessageBag(), 400);
        }


        User::find(auth()->user()->id)->update([
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        return ApiResponser::successResponse('data has been updated', $data = []);
    }

    public function latLongUpdate(Request $request)
    {
        User::find(auth()->user()->id)->update([
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        return ApiResponser::successResponse('data has been updated', $data = []);
    }

    public function deviceTokenUpdate(Request $request)
    {
        User::find(auth()->user()->id)->update([
            'device_token' => $request->device_token,
        ]);
        return ApiResponser::successResponse('data has been updated', $data = []);
    }

    public function updateImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|file|mimes:png,jpg,jpeg|max:1024',
            'oldImage' => 'required'
        ]);

        if ($validator->fails()) {
            return ApiResponser::errorResponse($validator->getMessageBag(), 400);
        }
        if ($files = $request->file('image')) {
            if ($request->oldImage) {
                $image_path = "storage/profile-images/" . $request->oldImage;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $imageName = time() . '-' . $files->getClientOriginalName();
            $path = env('PUBLIC_DIR') . 'storage/profile-images';
            $files->move($path, $imageName);
        }

        User::find(auth()->user()->id)->update([
            'image' => $imageName
        ]);
        return ApiResponser::successResponse('data has been updated', $data = []);
    }

    public function socialMediaUpdate(Request $request)
    {
        if ($request->google_id && $request->facebook_id) {
            User::find(auth()->user()->id)->update([
                'google_id' => $request->google_id,
                'facebook_id' => $request->facebook_id
            ]);
        } else if (!$request->google_id) {
            User::find(auth()->user()->id)->update([
                'facebook_id' => $request->facebook_id
            ]);
        } else {
            User::find(auth()->user()->id)->update([
                'google_id' => $request->google_id
            ]);
        }
        return ApiResponser::successResponse('data has been updated', $data = []);
    }

    public function changeRoleToBeever(Request $request)
    {
        if (auth()->user()->ktp && auth()->user()->selfie) {
            return ApiResponser::errorResponse(['failed', 'please wait for approval'], 400);
        }
        if ($request->file('ktp') && $request->file('selfie')) {
            $ktp = $request->file('ktp');
            $selfie = $request->file('selfie');
            $ktpName = 'KTP' . auth()->user()->id . time() . "." . $ktp->GetClientOriginalExtension();
            $selfieName = 'SELFIE' . auth()->user()->id . time() . "." . $selfie->GetClientOriginalExtension();
            $ktppath = env('PUBLIC_DIR') . 'storage/ktp-images';
            $selfiepath = env('PUBLIC_DIR') . 'storage/selfie-images';
            $ktp->move($ktppath, $ktpName);
            $selfie->move($selfiepath, $selfieName);


            User::find(auth()->user()->id)->update([
                'selfie' => $selfieName,
                'ktp' => $ktpName,
                'verified' => 0
            ]);

            return ApiResponser::successResponse('data has been update', $data = []);
        } else {
            return ApiResponser::errorResponse(['failed'], 400);
        }
    }

    //dev
    public function collection(Request $request)
    {
        $orderCode = 'N' . date('Ydmhis', strtotime(now()));
        $validator = Validator::make($request->all(), [
            'total_weight' => 'required',
            'total' => 'required',
            'fee_beever' => 'required',
            'location1' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'waste_type' => 'required',
            'waste_weight' => 'required',
            'subtotal' => 'required',
            // 'images' => 'required|image|file|mimes:png,jpg,jpeg|max:1024',
        ]);
        if ($validator->fails()) {
            return ApiResponser::errorResponse($validator->getMessageBag(), 400);
        }
        User::find(auth()->user()->id)->update([
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        FinalOrder::create([
            'order_code' => $orderCode,
            'user_id' => auth()->user()->id,
            'date' => now(),
            'total_weight' => $request->total_weight,
            'total' => $request->total,
            'fee_beever' => $request->fee_beever,
            'status' => 'suceed',
            'location1' => $request->location1,
            'location2' => ' '
        ]);

        FinalOrderDetail::create([
            'order_code' => $orderCode,
            'waste_type' => $request->waste_type,
            'waste_weight' => $request->waste_weight,
            'subtotal' => $request->subtotal
        ]);


        if ($files = $request->file('images')) {
            foreach ($files as $value) {
                $imageName = time() . '-' . $value->getClientOriginalName();
                $path = Config::get('PUBLIC_DIR') . 'storage/order-images';
                $value->move($path, $imageName);

                Image::create([
                    'order_code' => $orderCode,
                    'directory' => $imageName,
                    'user_id' => auth()->user()->id,
                    'waste_type' => $request->waste_type
                ]);
            };
        }
        $data = FinalOrder::where('order_code', $orderCode)->get();
        return ApiResponser::successResponse('data has been created', $data);
    }

    public function findBeever(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_code' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);
        if ($validator->fails()) {
            return ApiResponser::errorResponse($validator->getMessageBag(), 400);
        }

        $jsonString = file_get_contents('../location/location.json');
        $data = json_decode($jsonString, true);
        $collection = collect($data);

        $markers = $collection->where('status', 'ready')->map(
            function ($v, $i) use ($request) {
                $v['distance'] = DistanceBetweenTwoAddresses::calculate($request->lat, $request->lng, $v['lat'], $v['lng']);
                return $v;
            }
        );
        if (is_null($markers->first())) {
            $markers = $collection->where('status', 'on going')->map(
                function ($v, $i) use ($request) {
                    $v['distance'] = DistanceBetweenTwoAddresses::calculate($request->lat, $request->lng, $v['lat'], $v['lng']);
                    return $v;
                }
            );
        }
        // dd($markers);
        $beever = $markers->sortBy('distance')->first();
        if ($beever['distance'] > 2) {
            return ApiResponser::errorResponse(['beever not found'], 400);
        }
        $data = User::find($beever['beever_id'])->get();
        dd();
        Notification::many($data->device_token, 'new_order' . $request->order_code, 'sampah baru, nih!');
    }

    public function acceptOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_code' => 'required',
            'beever_id' => 'required',
        ]);
        if ($validator->fails()) {
            return ApiResponser::errorResponse($validator->getMessageBag(), 400);
        }


        $data = FinalOrder::where('order_code', $request->order_code)->update([
            'status' => 'completed'
        ]);
        $jsonString = file_get_contents('../location/location.json');
        $data = json_decode($jsonString, true);
        foreach ($data as $key => $value) {
            if ($value['beever_id'] == $data->beever_id) {
                $data[$key]['status'] = 'ready';
            }
        }
        $newJsonString = json_encode($data);
        file_put_contents('location.json', $newJsonString);

        $beever = User::find($data->beever_id)->decrement('balance', $data->total);
        Notification::many([$beever->device_token, auth()->user()->device_token], 'transaction success', 'user accepted!');
    }

    public function wasteList()
    {
        $data = Waste::all();
        return ApiResponser::successResponse('data found', $data);
    }

    public function collectionHistory()
    {
        $data = FinalOrder::where('user_id', auth()->user()->id)->latest()->filter(request(['search', 'type', 'start_date', 'finish_date']))
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

    public function detailCollectionHistory($orderCode)
    {
        $transaction = FinalOrder::where('user_id', auth()->user()->id)->where('order_code', $orderCode)->get();
        if ($transaction->isNotEmpty()) {
            $data = $transaction->map(function ($v, $i) {
                $v->detail->all();

                return $v;
            });
            return ApiResponser::successResponse('data found', $data);
        }
        return ApiResponser::errorResponse(['data not found'], 400);
    }

    public function cancelOrder(Request $request)
    {
        $bassic = FinalOrder::where('order_code', $request->order_code)->where('user_id', auth()->user()->id);
        $bassic->update([
            'status' => 'requested',
            'reason' => $request->reason
        ]);

        $data = $bassic->get();
        return ApiResponser::successResponse('data found', $data);
    }


    public function rate(Request $request)
    {
        Rate::create([
            'user_id' => auth()->user()->id,
            'driver_id' => $request->driver_id,
            'rate' => $request->rate,
            'review' => $request->review,
        ]);
        return ApiResponser::successResponse('data has been created', $data = []);
    }

    public function giveFeedback(Request $request)
    {
        FeedBack::create([
            'user_id' => auth()->user()->id,
            'message' => $request->message
        ]);
        return ApiResponser::successResponse('data has been created', $data = []);
    }
}
