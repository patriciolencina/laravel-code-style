<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopLocation extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Response(Shop::orderBy('distance', 'asc')
            ->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Shop::truncate();

        foreach ($request->listOfShops as $shopObject) {
            $shop = new Shop;
            $shop->name = $shopObject['name'];
            $shop->address = $shopObject['address'];
            $shop->distance = $shopObject['distance'];
            $shop->latitude = $shopObject['latitude'];
            $shop->longitude = $shopObject['longitude'];
            $shop->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Shop                $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop $shop
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop) {
        //
    }
}
