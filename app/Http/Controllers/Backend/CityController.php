<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Centre_Point;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.City.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centerPoint = Centre_Point::get()->first();
        return view('backend.City.create', ['centerPoint' => $centerPoint]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'coordinate' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg'
        ]);

        $city = new City;
        if ($request->hasFile('image')) {

            /**
             * Upload file to public folder
             */
            $file = $request->file('image');
            $uploadFile = $file->hashName();
            $file->move('upload/Cities/', $uploadFile);
            $city->image = $uploadFile;

            /**
             * Upload file image to storage
             */
            // $file = $request->file('image');
            // $file->storeAs('public/ImageCities',$file->hashName());
            // $city->image = $file->hashName();
        }

        $city->name = $request->input('name');
        $city->slug = Str::slug($request->name, '-');
        $city->description = $request->input('description');
        $city->coordinates = $request->input('coordinate');
        $city->save();

        if ($city) {
            return to_route('city.index')->with('success', 'Data berhasil disimpan');
        } else {
            return to_route('city.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $centerPoint = Centre_Point::get()->first();
        return view('backend.Spot.edit', [
            'centerPoint' => $centerPoint,
            'city' => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'coordinate' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->hasFile('image')) {

            /**
             * Hapus file image pada folder public/upload/spots
             */
            if (File::exists('upload/cities/' . $city->image)) {
                File::delete('upload/cities/' . $city->image);
            }

            /**
             * Proses upload file image ke folder public/upload/spots
             */
            $file = $request->file('image');
            $uploadFile = $file->hashName();
            $file->move('upload/cities/', $uploadFile);
            $city->image = $uploadFile;

            /**
             * Proses hapus & upload file image ke folder public/upload/spots
             */
            // Storage::disk('local')->delete('public/ImageSpots/' . ($spot->image));
            // $file = $request->file('image');
            // $file->storeAs('public/ImageSpots', $file->hashName());
            // $spot->image = $file->hashName();
        }

        $city->name = $request->input('name');
        $city->slug = Str::slug($request->name, '-');
        $city->description = $request->input('description');
        $city->coordinates = $request->input('coordinate');
        $city->update();

        if ($city) {
            return to_route('city.index')->with('success', 'Data berhasil diupdate');
        } else {
            return to_route('city.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        if (File::exists('upload/cities/' . $city->image)) {
            File::delete('upload/cities/' . $city->image);
        }

        //Storage::disk('local')->delete('public/ImageSpots/' . ($spot->image));
        $city->delete();
        return redirect()->back();
    }
}
