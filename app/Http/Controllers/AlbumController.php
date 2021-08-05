<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        $numbers = array();

        foreach ($albums as $album) {
            $number = Photo::all()->where('id_album', '=', $album->id)->count();    
            array_push($numbers, $number);
        }

        

        return view('index', ['albums' => $albums, 'counts' => $numbers]);
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
        $avatar = $request->input('avatar');
        $name = $request->input('name');    

        $album = Album::create([
            "avatar" => $avatar,
            "album_name" => $name
        ]);

        $album->save();

        return redirect()->action([
            AlbumController::class, 'index'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // description of album
        $album = Album::find($id); 
        $number_of_album = Photo::where('id_album', '=', $id)->count(); // number of photo in album

        // get list photo in album
        $list_photos = Photo::all()->where('id_album', '=', $id);

        // view of AlbumController.show is have 4 columns
        // we will split data to 4 column before send them to view
        $column_1 = array();
        $column_2 = array();
        $column_3 = array();
        $column_4 = array();
        $cnt = 0;
        foreach($list_photos as $photo){
            if($cnt % 4 == 0){
                array_push($column_1, $photo);    
            } else if($cnt % 4 == 1){
                array_push($column_2, $photo); 
            } else if($cnt % 4 == 2){
                array_push($column_3, $photo);
            } else if($cnt % 4 == 3){
                array_push($column_4, $photo);
            }

            $cnt++;
        }

        return view('show-album', 
            ['album' => $album, 
            'number_of_album' => $number_of_album,
            'column_1' => $column_1,
            'column_2' => $column_2,
            'column_3' => $column_3,
            'column_4' => $column_4]);
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
        // delete all photos in album
        $photos = Photo::where('id_album', '=', $id);
        $photos->delete();

        // delete album
        $album = Album::find($id);
        $album->delete();

        return redirect("/");
    }
}
