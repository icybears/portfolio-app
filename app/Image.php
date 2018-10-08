<?php

namespace App;


use Illuminate\Support\Facades\Storage;
use JD\Cloudder\Facades\Cloudder;

class Image
{
    /**
     * upload
     *
     * @param [string] $image
     * @param [string] $folder
     * @return string Name of the uploaded image
     */
    static public function uploadToCloudder($image)
    {
        // $image = $request->file('image');
        
               $name = $image->getClientOriginalName();

               $image_name = $image->getRealPath();

                // try{
                Cloudder::upload($image_name,null, array("timeout" => 60));
               
                // } catch(\Exception $e)
                // {
                    // report($e);
                    // abort(500);

                // }
        
               list($width, $height) = getimagesize($image_name);

                // try{
                    $image_name = Cloudder::getPublicId();
                    $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                // }
                // catch(\Exception $e)
                // {
                    // report($e);
                    // abort(500);
                // }
             
            return ['image_name'=> $image_name,'image_url' => $image_url];
           
    }

    static public function deleteFromCloudder($imageName){
        try{
            Cloudder::delete($imageName);            
        } catch(\Exception $e)
        {
            report('Error while deleting previous image');
            abort(500);
        }
    }
    static public function upload($image, $folder)
    {
        $uploadedImage = $image;
        
        $imageName = str_random(16) . time() . "." . $uploadedImage->getClientOriginalExtension();

        try{
            Storage::disk('public')
                ->put($folder . "/" . $imageName, file_get_contents($uploadedImage));
        } catch(\Exception $e) {
            report('Problems storing the image');
            abort(500);
            
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
            report('Problems deleting the image');
            abort(500);
        }
        
    }

}
