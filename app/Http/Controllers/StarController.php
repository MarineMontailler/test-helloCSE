<?php

namespace App\Http\Controllers;

use App\Models\Star;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;
use Response;
use Artisan;
use Illuminate\Support\Str;


class StarController extends Controller
{
  
    public function index()
    {
        // Get stars
        try{
            $stars = DB::table("stars as s")
            ->select('s.*')
            ->get();
            return Response::json(['data' => $stars],200);
        }
        
        catch(Exception $e){
            return Response::json(['errors' => 'Bad Request'], 400);
        }
    }

    
    public function starById($id){

        // Get a star by id
        try{
            $star = Star::get()->where('id', $id)->first();

            return Response::json(['data' => $star],200);
        }catch(Exception $e){
            return Response::json(['errors' => 'Bad Request'], 400);
        }
    }

    public function create(Request $request){

        // Create new star

        try{
            $validator = Validator::make($request->all(), [

                'firstname'    => 'required',
                'lastname'     => 'required',
                'image'        => 'required',
                'description'  => 'required',

            ]);

            if ($validator->fails()) {
                return Response::json(['errors' => $validator->errors()], 400);
            }

            $star= new Star;

            $star->firstname     = $request->firstname;
            $star->lastname      = $request->lastname;
            $star->image         = $request->image;
            $star->description   = $request->description;


            $star->save();

            return Response::json([
                'data' => 'added successfully',
                'last' => $star
            ],200);

        }catch(Exception $e){
            return Response::json(['errors' => 'Bad Request'], 400);
        }

    }

    public function update($id, Request $request){

        // Update selected star
        
        try{

            $validator = Validator::make($request->all(), [
                'firstname'    => 'required',
                'lastname'     => 'required',
                'image'        => 'required',
                'description'  => 'required',
            ]);

            if ($validator->fails()) {
                return Response::json(['errors' => $validator->errors()],400);
            }

            $star = Star::where('id', $id)->first();


            $star->firstname     = $request->firstname;
            $star->lastname      = $request->lastname;
            $star->image         = $request->image;
            $star->description   = $request->description;

            $star->update();

        }catch(Exception $e){
            return Response::json(['errors' => 'Bad Request'], 400);
        }

    }

    public function delete($id){

        // Delete selected star

        try{
            $star = Star::where('id', $id)->delete();

            return Response::json(['data' => 'deleted successfully'],200);
        }catch(Exception $e){
            return Response::json(['errors' => 'Bad Request'], 400);
        }
    }


}