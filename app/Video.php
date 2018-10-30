<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    /**
     * Get all of the video's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * Get all of the tags for the Videos.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }


    /**
     * upload a video file 
     */
    public static function upload(Request $request)
    {
      $uploadedFile = $request->file('file');
      $filename = time().$uploadedFile->getClientOriginalName();

      // $files = $request->file($args['file'])->store('public/files');
      $upload = Storage::disk('local')->putFileAs(
        'public/videos/',
        $uploadedFile,
        $filename
      );
      if($upload){
        return $contents = Storage::url('public/videos/'.$filename);
      }else{
        return null;
      }

    }




}
