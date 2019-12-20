<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

use Intervention\Image\ImageManagerStatic as Image;

class FilesContoller extends Controller
{
    public function upload(Request $request)
    {

        $result = ['success ' => true];
        $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

        \Image::make($request->photo)->save(public_path('images/').$name);
         $request->merge(['photo' => $name]);
            $photo = $request->photo;
            $brand = $request->brand;
            $model = $request->model;
            $releaseDate = $request->releaseDate;
            $power = $request->power;
            $cost = $request->cost;
            $phoneNumber = $request->phoneNumber;
            $descripton = $request->descripton;
            try{
                $newFile = [
                    'photo' =>$photo,
                    'brand' => $brand,
                    'model' => $model,
                    'releaseDate' => $releaseDate,
                    'cost' => $cost,
                    'power' => $power,
                    'phoneNumber' => $phoneNumber,
                    'descripton' => $descripton,
                    'booked'=>false,
                    'bookhov'=>false
                ];
                File::create($newFile);
            } catch(Exception $e){
                $result['success'] = false;
                $result['error'] = $e->getMessage();
            }
        return $request->photo;
    }
    public function list(){
        return File::latest()->get();
    }
    public function delete(File $file){
        $result = ['success ' => true];
        if($file){
            $file->delete();
        } else {
            $result['success'] = false;
        }
        return response()->json($result);
    }
    public function rent($file){

        $f = File::find($file);
        $f->booked = 1;
        $f->save();
        $result = ['success ' => true];

        return response()->json($result);
    }
    public function unrent($file){
        $result = ['success ' => true];
        $f = File::find($file);
            $f->booked = 0;
            $f->save();
      
        return response()->json($result);
    }
}
