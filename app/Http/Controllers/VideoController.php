<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Video::all();
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
    public function store(Request $r)
    {
//        return $r->all();

         if(!empty($r->name)) {
             $link = $r->name;


         }


        if(!empty($r->url_name)) {
            $name = $r->url_name;


        }



        Video::create(['url' => $link, 'name' => $name]);



         return 200;






    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return $video;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Video $video)
    {


//        return $r->all();

          $attr = [];
        $attr['name'] = $r->name ? $r->name : $video->name;
        $attr['url'] = $r->url ? $r->url : $video->url;
//        $attr['iso_link'] = $r->iso_link;
//        $attr['text'] = $r->text;

//        foreach($attr as $key => $val) {
//            if(empty($attr[$key])) {
//                return 500;
//            }
//
//
//
//        }



        if($video->update($attr)) {
            return 200;
        }




        return 500;



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        if($video->delete()) {


            return Video::all();
        }

        return 0;
    }
}
