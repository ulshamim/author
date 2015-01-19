<?php namespace Redooor\Redminportal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Promotion extends Model {

    public function images()
    {
        return $this->morphMany('Redooor\Redminportal\Image', 'imageable');
    }
    
    public function deleteAllImages()
    {
        $folder = 'assets/img/promotions/';
        
        foreach ($this->images as $image)
        {
            // Delete physical file
            $filepath = $folder . $image->path;
            
            if( File::exists($filepath) ) {
                File::delete($filepath);
            }
            
            // Delete image model
            $image->delete();
        }
    }
    
    public static function getAllActiveOrdered()
    {
        return Promotion::where('active', '=', '1')->orderBy('start_date', 'desc')->orderBy('name')->get();
    }

}