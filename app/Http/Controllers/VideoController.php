<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

class VideoController extends Controller
{
    public function newVideo()
    {
        $this->validate(request(), 
            [
                'title' => 'required|max:255',
                'image' => 'required|image',
                'video' => 'required|file|mimetypes:video/mp4',
            ],
            [ 
                'title.max' => 'Pastikan Title tidak melebihi 255 karakter ',
                'image.image' => 'Pastikan thumbnail dalam format jpg, jpeg, png, bmp, gif, svg, atau webp',
                'video.mimetypes' => 'Pastikan video dalam format mp4',
            ]
        );

        try {
            $fileName = Str::random(100);
            $vidPath = 'videos/' . $fileName.'.mp4';
            $imgPath = 'images/' . $fileName.'.png';
            
            $isvidUploaded = Storage::disk('public')->put($vidPath, file_get_contents(request('video')));
            $isimgUploaded = Storage::disk('public')->put($imgPath, file_get_contents(request('image')));
    
            // File URL to access the video in frontend
            // $url = Storage::disk('public')->url($filePath);
            $data = [
                'title' => request('title'),
                'description' => request('desc'),
                'category' => request('category'),
                'link_video' => $vidPath,
                'link_thumbnail' => $imgPath,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ];

            $user = Video::insert($data);

            return redirect()->route('getVideo');
        } catch (Exception $error) {
            session()->flash('error', $error);
            return redirect()->back();
        }
    }

    public function getVideo()
    {
        $video =  Video::query()
        ->paginate(10);
 
        return view('page.admin-datavideo', [
            'type_menu' => 'akun',
            'videos' => $video,
        ]);
    }

    public function playVideo($id)
    {
        $video = Video::find($id);

        return view('page.admin-videoplayer', [
            'type_menu' => '',
            'video' => $video,
        ]);
    }

    public function deleteVideo($id)
    {
        $video = Video::find($id);

        $delVid = Storage::disk('public')->delete($video->link_video);
        $delImg = Storage::disk('public')->delete($video->link_thumbnail);

        $data_delete = $video->delete();
        dd([$data_delete, $delImg, $delVid]);
    }
}
