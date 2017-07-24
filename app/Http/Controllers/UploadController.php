<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Image;
use Auth;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload.uploadImage');
    }

    public function uploadImage(Request $request)
    {
        /*//Display File Real Path
        $file = $request->file('image');

        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();

        //Move Uploaded File
        $destinationPath = 'uploads';
        //$file->move($destinationPath,$file->getClientOriginalName());*/


        if($request->hasFile('image')){
            /*//return $request->file('image');
            //return $request->image->path();
            //return $request->image->extension();
            //return $request->image->store('public'); //works file
            return Storage::putFile('public',$request->file('image'));*/


            $user_id = Auth::user()->id;
            $images = Image::where('user_id', $user_id)
                //->orderBy('name', 'desc')
                //->take(10)
                ->get();
            foreach ($images as $image){
                if($image->imagename){
                    Storage::delete('public/'.$image->imagename);
                }
            }
            $deleteRows = Image::where('user_id', $user_id)->delete();
            $file = $request->file('image');
            $imagesize = $file->getClientSize();
            $storage_str = Storage::putFile('public',$request->file('image'));
            $final_storage_str = str_replace("public/","",$storage_str);

            $image = new Image;
            $image->user_id = $user_id;
            $image->imagename = $final_storage_str;
            $image->imagesize = $imagesize;
            $image->save();

            //return redirect()->back()->with('msg', 'successfully uploaded');

            //return redirect()->route('profile', ['id' => 1]);
            //return redirect()->route('profile', [$user]);
            /*return redirect()->action(
                'UserController@profile', ['id' => 1]
            );*/

            return redirect()->route('home');

        }else{
            return 'No File Selected';
        }
    }
}
