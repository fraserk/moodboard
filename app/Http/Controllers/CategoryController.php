<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Moodboard;
use App\Category;
use App\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Moodboard $moodboard, Category $category)
    {
        $data = $moodboard->categories()->where('category_id', $category->id)->first()->pivot->settings;
        $settings = json_decode($data);
        //dd($settings);
        return view('category.show', compact('moodboard', 'category', 'settings'));
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
    public function update(Request $request)
    {
        $moodboard = Moodboard::find(request()->moodboard)->categories()->where('category_id', request()->category)->first();
        //dd($moodboard->pivot);
        $settings =  json_encode([
          request()->only('detail')
        ]);
        Moodboard::find(request()->moodboard)->categories()->updateExistingPivot(request()->category, ['settings'=> $settings]);
        return redirect()->route('user.moodboard.category.show', [auth()->user(), request()->moodboard, request()->category]);
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
