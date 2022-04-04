<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function allNews()
    {
        $data = News::all();
        return view('news.allnews', [
            'news' => $data
        ]);
    }
    public function detailNews($slug)
    {
        $data = News::where('slug', $slug)->get();
        return view('news.detailNews', [
            'news' => $data
        ]);
    }

    public function addNews()
    {
        return view('news.addNews');
    }

    public function updateNews($slug)
    {
        $data = News::where('slug', $slug)->get();
        return view('news.updateNews', [
            'news' => $data
        ]);
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
                // Storage::delete($request->oldBanner);
            }
            $file = $request->file('banner');
            $bannerName = time() . "." . $file->GetClientOriginalExtension();
            $path = env('PUBLIC_DIR') . 'storage/news-images';
            $file->move($path, $bannerName);
            $validateData['banner'] = $bannerName;
            // $validateData['banner'] = $request->file('banner')->store('news-images');
        }
        $validateData['user_id'] = Auth()->user()->id;

        News::where('id', $request->id)->update($validateData);

        toast("Post has been edited!", "success");
        return redirect()->route('allNews');
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

        toast("Post has been added!", "success");
        return redirect()->route('allNews');
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
        toast("Post has been deleted!", "success");
        News::where('id', $request->id)->delete();
        return redirect()->route('allNews');
    }
}
