<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['instansis'] = Instansis::orderBy('id','desc')->paginate(10);
   
        return view('instansis.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instansi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'instansi' => 'required',
            'description' => 'required',
        ]);
   
        Product::create($request->all());
    
        return Redirect::to('instansi')
       ->with('success','Sukses! Instansi telah tersimpan.');
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
        $where = array('id' => $id);
        $data['description'] = Instansi::where($where)->first();
 
        return view('instansi.edit', $data);
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
        $request->validate([
            'instansi' => 'required',
            'description' => 'required',
        ]);
         
        $update = ['instansi' => $request->instansi, 'description' => $request->description];
        Instansi::where('id',$id)->update($update);
   
        return Redirect::to('instansi')
       ->with('success','Sukses! Instansi berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Instansi::where('id',$id)->delete();
   
        return Redirect::to('instansi')->with('success','Instansi berhasil dihapus');
    }
}
