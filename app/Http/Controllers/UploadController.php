<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Video;
use Auth;

class UploadController extends Controller
{
    public function index()
    {
        return view('pages.upload.upload');
    }

    public function upload(Request $request){
        $request->validate([
        'file' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'
        ]);

        $Video = new Video;
        $id = Auth::user()->id;
        
        if($request->file()) {

            $fileName = $id.'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $Video->name = time().'_'.$request->file->getClientOriginalName();
            $Video->video_path = '/storage/' . $filePath;
            $Video->user_id = $id;
            $Video->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }

}
