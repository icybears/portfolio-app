<?php

namespace App;


use Illuminate\Support\Facades\Storage;

class Image
{
    /**
     * upload
     *
     * @param [string] $image
     * @param [string] $folder
     * @return string Name of the uploaded image
     */
    static public function upload($image, $folder)
    {
        $uploadedImage = $image;
        
        $imageName = str_random(16) . time() . "." . $uploadedImage->getClientOriginalExtension();

        try{
            Storage::disk('public')
                ->put($folder . "/" . $imageName, file_get_contents($uploadedImage));
        } catch(\Exception $e) {
            echo 'Problems storing the image';
            
        }

        return $imageName;
    }
    /**
     * delete
     *
     * @param [string] $imageName
     * @param [string] $folder
     * @return void
     */
    static public function delete($imageName, $folder)
    {
        try{
            Storage::disk('public')->delete($folder ."/" . $imageName);
        } catch(\Exception $e) {
            echo 'Problems deleting the image';
        }
        
    }

}
