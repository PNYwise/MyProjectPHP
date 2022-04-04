<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Traits\ApiResponser;

class NewsController extends Controller
{
    use ApiResponser;

    public function allNews()
    {
        $data = News::all()->map(function ($v, $i) {
            $v->user->full_name;
            return $v;
        });
        return ApiResponser::successResponse('data found', $data);
    }
    public function detailNews($slug)
    {
        $data = News::where('slug', $slug)->get()->map(function ($v, $i) {
            $v->user->full_name;
            return $v;
        });
        return ApiResponser::successResponse('data found', $data);
    }

    public function editNews(Request $request, $slug)
    {
        $rules = [
            'judul' => 'required',
            'banner_desctiption' => 'required|max:60',
            'desctiption' => 'required'
        ];

        $find = News::find($request->id);
        if ($find->slug != $request->slug) {
            $rules['slug'] = 'required|unique:news';
        }

        $validateData = $request->validate($rules);

        if ($request->file('banner')) {
            if ($request->oldBanner) {
                $path = env('PUBLIC_DIR') . 'storage/news-images/' . $request->oldBanner;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            $file = $request->file('banner');
            $bannerName = time() . "." . $file->GetClientOriginalExtension();
            $path = env('PUBLIC_DIR') . 'storage/news-images';
            $file->move($path, $bannerName);
            $validateData['banner'] = $bannerName;
        }
        $validateData['user_id'] = Auth()->user()->id;
        News::where('id', $request->id)->update($validateData);

        return ApiResponser::successResponse('data has been updated');
    }

    public function storeNews(Request $request)
    {

        $validateData = $request->validate([
            'judul' => 'required',
            'slug' => 'required|unique:news',
            'banner_desctiption' => 'required|max:60',
            'banner' => 'image|file|max:1024',
            'desctiption' => 'required'
        ]);


        if ($request->file('banner')) {

            $file = $request->file('banner');
            $bannerName = time() . "." . $file->GetClientOriginalExtension();
            $path = env('PUBLIC_DIR') . 'storage/news-images';
            $file->move($path, $bannerName);
            $validateData['banner'] = $bannerName;
        }


        $validateData['user_id'] = Auth()->user()->id;
        $validateData['date'] = now();
        News::create($validateData);

        return ApiResponser::successResponse('data has been added');
    }

    public function deleteNews(Request $request)
    {
        if ($request->banner) {
            $path = env('PUBLIC_DIR') . 'storage/news-images/' . $request->banner;
            if (File::exists($path)) {
                File::delete($path);
            }
            // Storage::delete($request->banner);
        }
        News::where('id', $request->id)->delete();
        return ApiResponser::successResponse('data has been deleted');
    }
}
