<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request->search)){
            $slide = DB::table('slide')
                ->where('name', 'like', '%'.$request->search.'%')
                ->simplePaginate(10);
        }
        else{
            $slide = DB::table('slide')->simplePaginate(10);
        }
        return view('admin.pages.slide.index', compact('slide'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slide.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'image' => 'max:300',
        ])->validate();
        $slide = new Slide();
        $slide->name = $request->name;
        $slide->slug = $request->slug;
        $slide->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/slide', $filename);
            $slide->image = $filename;
        }
        $slide->save();
        return redirect('slide/create')->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.pages.slide.edit', compact('slide'));
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
        Validator::make($request->all(), [
            'image' => 'max:300',
        ])->validate();
        $slide = Slide::find($id);
        $slide->name = $request->name;
        $slide->slug = $request->slug;
        $slide->description = $request->description;
        if($request->hasFile('image')){
            $path = 'assets/uploads/slide/' . $slide->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/slide', $filename);
            $slide->image = $filename;
        }
        $slide->update();
        return redirect('slide')->with('success', 'Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        if($slide->image){
            $path = 'assets/uploads/slide/' . $slide->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $slide->delete();
        return redirect('slide')->with('success','Deleted success');
    }
}
