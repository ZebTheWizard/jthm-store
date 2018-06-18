<?php

namespace App\Http\Controllers;

use Image;
use Storage;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
      $items = $r->q ? Item::where('name', $r->q)->simplePaginate(15)
                     : Item::simplePaginate(15);
      return view('welcome', [
        "items" => $items
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
          "image" => "required|mimes:jpeg,png",
          "name" => "required|string",
          "price" => "required|integer",
          "description" => "required|string",
        ]);

        $file = $r->file('image');
        $image = Image::make($file);
        $path = $file->hashName("public/items");
        $image->resize(500, null, function($constraint) {
          $constraint->aspectRatio();
        });
        Storage::put($path, (string) $image->encode(), 'public');

        $i = new Item;
        $i->name = $r->name;
        $i->price = $r->price * 100;
        $i->description = $r->description;
        $i->image = Storage::url($path);
        $i->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
