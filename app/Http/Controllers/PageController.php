<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();
        return response()->json($pages, 200);
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
        Page::create([
            'page_title' => $request->page_title,
            'page_slug' => $request->page_slug,
            'page_content' => $request->page_content,
            'page_meta_keywords' => $request->page_meta_keywords,
            'page_meta_desc' => $request->page_meta_desc,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json("Page Created", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $page = Page::where('page_slug', $request->slug)->first();

        return response()->json($page, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Page::where('id', $request->id)->update([
            'page_title' => $request->page_title,
            'page_slug' => $request->page_slug,
            'page_content' => $request->page_content,
            'page_meta_keywords' => $request->page_meta_keywords,
            'page_meta_desc' => $request->page_meta_desc,
            'updated_at' => now()
        ]);

        return response()->json("Page Updated", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $page = Page::where('id',$request->id)->delete();
                return response()->json('Deleted',200);
            }
            catch(Exception $e){
                return response()->json($e, 422);
            }
    }
}
