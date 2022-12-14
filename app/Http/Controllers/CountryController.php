<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use League\Flysystem\Adapter\CanOverwriteFiles;

class CountryController extends Controller
{


    public function getAll()
    {

        return Country::all();


    }






    public function getUpdated()
    {
        $r = request();




     $country = Country::find((int)$r->id);




        if($r->image) {


            $imageName = time().'.'.$r->image->getClientOriginalExtension();
            $r->image->move('uploads/images/', $imageName);


            $country->update([
//                'name' => $r->name,
//                'code' => $r->code,
                'image' => "uploads/images/".$imageName,



            ]);



        }




        if($r->code) {





            $country->update([
//                'name' => $r->name,
                'code' => $r->code,
//                'image' => "uploads/images/".$imageName,



            ]);



        }





        if($r->name) {





            $country->update([
                'name' => $r->name,
//                'code' => $r->code,
//                'image' => "uploads/images/".$imageName,



            ]);



        }
















        return 200;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $r = request();

        if($r->search) {
            return  Country::where('name', 'like', "%".$r->search."%")
            ->paginate($r->limit);



        }



        return  Country::paginate($r->limit);




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
        $r = request();


        if(empty($r->name) || empty($r->code)) {
            return 500;
        }



        if($r->image) {


            $imageName = time().'.'.$r->image->getClientOriginalExtension();
            $r->image->move('uploads/images/', $imageName);
        }


        $c = Country::create([
           'name' => $r->name,
            'code' => $r->code,
            'image' => "uploads/images/".$imageName,



        ]);




        if($c) {

            return Country::all();
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return $country;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return 300;;
    }
}
