<?php

namespace App\Http\Controllers;

use App\WhatsappLink;
use Illuminate\Http\Request;




class WhatsappLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return WhatsappLink::first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $name =  $r->name;
        $first = WhatsappLink::first();
        if($first) {


            $first->update([
                'name' => $name,
            ]);





        } else {



            WhatsappLink::create([
                'name' => $name,
            ]);




        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WhatsappLink  $whatsappLink
     * @return \Illuminate\Http\Response
     */
    public function show(WhatsappLink $whatsappLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WhatsappLink  $whatsappLink
     * @return \Illuminate\Http\Response
     */
    public function edit(WhatsappLink $whatsappLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WhatsappLink  $whatsappLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhatsappLink $whatsappLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WhatsappLink  $whatsappLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatsappLink $whatsappLink)
    {
        //
    }
}
