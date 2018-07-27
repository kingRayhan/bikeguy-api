<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewEpisod;
use App\Radio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RadioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episods = Radio::latest()->get();
        return view('radio.index' , compact('episods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewEpisod $request)
    {   


        $episod_no = $request->episod_no;

        if( $request->audio->extension() == 'mp3' || $request->audio->extension() == 'mpga' )
        {
            $extension = 'mp3';
        }
        $audio = $request->audio->storeAs('public/radio/episods' , 'BikeGuy-radio-episod-' . $episod_no . '.' . $extension  );

        Radio::create([
            'topic' => $request->topic,
            'episod_no' => $request->episod_no,
            'audio_public' => Storage::url($audio),
            'audio_path' => $audio
        ]);

        return redirect()->route('radio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Radio  $radio
     * @return \Illuminate\Http\Response
     */
    public function show(Radio $radio)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Radio  $radio
     * @return \Illuminate\Http\Response
     */
    public function edit(Radio $radio)
    {
        return view('radio.edit' , compact('radio') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Radio  $radio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radio $radio)
    {

        $old_episod_no = $radio->episod_no;

        $radio->update([
            'topic' => $request->topic
        ]);


        if($request->episod_no != $radio->episod_no)
        {
            $radio->update([
                'audio_path' => 'public/radio/episods/BikeGuy-radio-episod-' . $request->episod_no . '.mp3',
                'audio_public' => '/storage/radio/episods/BikeGuy-radio-episod-' . $request->episod_no . '.mp3',
                'episod_no' => $request->episod_no
            ]);
            Storage::move( 'public/radio/episods/BikeGuy-radio-episod-' . $old_episod_no . '.mp3' , 'public/radio/episods/BikeGuy-radio-episod-' . $request->episod_no . '.mp3' );
        }



        if( $request->hasFile('audio') )
        {

            $episod_no = $request->episod_no;
            if( $request->audio->extension() == 'mp3' || $request->audio->extension() == 'mpga' )
            {
                $extension = 'mp3';
            }

            Storage::delete($radio->audio_path);
            $audio = $request->audio->storeAs('public/radio/episods' , 'BikeGuy-radio-episod-' . $episod_no . '.' . $extension  );

            $radio->update([
                'audio_public' => Storage::url($audio),
                'audio_path' => $audio
            ]);
        }
        return redirect()->route('radio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Radio  $radio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radio $radio)
    {
        Storage::delete($radio->audio_path);
        $radio->delete();
        return redirect()->route('radio.index');
    }
}
