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
    public function store(Request $request,  Moodboard $moodboard, Category $category)
    {
        $settings =  json_encode(
        $request->all()
      );
        return  Moodboard::find($moodboard)->categories()->updateExistingPivot($category, ['settings'=> $settings]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user, Moodboard $moodboard, Category $category)
    {
        $data = $moodboard->categories()->where('category_id', $request->category->id)->first()->pivot->settings;
        $settings =  $data;
        if ($request->ajax()) {
            return $settings;
        }
        //dd();
        return view('category.show', compact('moodboard', 'category'));
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
        //dd($moodboard->pivot);
        $settings =  json_encode(
          request()->all()
        );

        return Moodboard::find($request->moodboard)->categories()->updateExistingPivot($request->category, ['settings'=> $settings]);
        //return redirect()->route('user.moodboard.category.show', [auth()->user(), request()->moodboard, request()->category]);
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
