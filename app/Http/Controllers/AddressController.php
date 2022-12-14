<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;




class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Address::first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {








         $image =  $request->image;

        $name =  $request->name;

        $first = Address::first();





        if( $image) {



          if(strlen($image)>40) {


              $folderPath = "uploads/transaction_images/";

              $base64Image = explode(";base64,", $request->image);
              $explodeImage = explode("image/", $base64Image[0]);
              $imageType = $explodeImage[1];
              $image_base64 = base64_decode($base64Image[1]);
              $file = $folderPath . uniqid() . '.' . $imageType;

              file_put_contents($file, $image_base64);


          }















        }









        if($first) {


            $first->update([
                'address' => $name,
                'image' => isset($file) ? $file : 'uploads/transaction_images/avatar.jpg',
            ]);





        } else {



            Address::create([
                'address' => $name,
                'image' => isset($file) ? $file : 'uploads/transaction_images/avatar.jpg',
            ]);




        }



        return 200;









































    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
