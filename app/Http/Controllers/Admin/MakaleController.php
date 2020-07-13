<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\Makale;
use App\Resim;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MakaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makaleler = Makale::paginate(10);
        return view("admin/makale_list",compact('makaleler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriler = Kategori::pluck("baslik","id")->all();

        return view("admin/makale_create",compact('kategoriler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "baslik"=>"required|max:255",
            "icerik"=>"required",
            "kategori_id"=>"required",
            "resim"=> "required"
        ]);

        $input =$request->all();
        $input["user_id"] = Auth::user()->id;
        if (empty($input["durum"]))
        {
            $input["durum"]=0;
        }
        else
        {
            $input["durum"]=1;
        }

        $makale =Makale::create($input);

        if ($resim = $request->file("resim"))
        {

            $resim_name = time().".".$resim->getClientOriginalExtension();
            $thumb = "thumb_".time().".".$resim->getClientOriginalExtension();

            Image::make($resim->getRealPath())->fit(1900,872)->fill(array(0,0,0,0.5))->save(public_path("uploads/".$resim_name));
            Image::make($resim->getRealPath())->fit(600,400)->save(public_path("uploads/thumb/".$thumb));

            $input = [];
            $input['name'] = $resim_name;
            $input['imageable_id'] = $makale->id;
            $input['imageable_type'] = "App\Makale";

            Resim::create($input);

        }

        Session::flash('durum',1);
        return redirect("makale");
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
        $makale = Makale::find($id);
        $kategoriler = Kategori::pluck("baslik","id")->all();

        return view("admin/makale_edit",compact('makale','kategoriler'));
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
        $this->validate($request, [
            "baslik"=>"required|max:255",
            "icerik"=>"required",
            "kategori_id"=>"required"
        ]);

        $input =$request->all();

        if (empty($input["durum"]))
        {
            $input["durum"]=0;
        }
        else
        {
            $input["durum"]=1;
        }

        $makale =Makale::find($id)->update($input);

        if ($resim = $request->file("resim"))
        {

            $resim_name = $makale->resim->name;
            $thumb = "thumb_".$makale->resim->name;

            Image::make($resim->getRealPath())->fit(1900,872)->fill(array(0,0,0,0.5))->save(public_path("uploads/".$resim_name));
            Image::make($resim->getRealPath())->fit(600,400)->save(public_path("uploads/thumb/".$thumb));
        }

        Session::flash('durum',1);
        return redirect("makale");
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
