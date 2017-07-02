<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Datetime;
use DB;
use App\libro;
use App\autor;
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $autores=autor::all();
       return view('libro.index',compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {           
               

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function data()
    {
        $orders=libro::all();
        foreach ($orders as $key => $value) {
          
            if(count(autor::find($value->id_autor)))
                $value->id_autor=autor::find($value->id_autor)->nombre;
            else $value->id_autor='No asignado';
               
        }
        return \Datatables::of($orders)->addColumn('action', 'libro.partials.vista')->make(true) ; 
    }
    public function data_prestar()
    {
        $orders=libro::all();
        foreach ($orders as $key => $value) {
          
            if(count(autor::find($value->id_autor)))
                $value->id_autor=autor::find($value->id_autor)->nombre;
            else $value->id_autor='No asignado';
               
        }
        return \Datatables::of($orders)->addColumn('action', 'libro.partials.vista_prestar')->make(true) ; 
    }
   public function store(Request $request)
    {   
        if($request->crear==0)
           $libro=new libro;
       else $libro=libro::find($request->get('id_libro'));
            $libro->nombre=$request->nombre;
            $libro->descripcion=$request->descripcion;
            $libro->id_autor=$request->id_autor;
            $libro->fecha_publicacion=$request->fecha_publicacion;
            $libro->fecha_adquisicion=$request->fecha_adquisicion;
            $libro->estado_libro=$request->estado_libro;
            $libro->save();
           return 'Libro guardado';
        

    }
    public function buscar_libro()
    {
        return view('libro.buscar');
    }
    //Funcion para obtener una habitacion
    //@Param $request -> viene el id de la habitacion
    public function get(Request $request)
    {
        $libro= libro::find($request->id);

        return $libro;
    }
    public function reporte()
    {
        return view('reporte.libro');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           
 
    }
    //funcion para la disponibilidad
   
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
        $libro=libro::find($id);
        $libro->delete();
        return 'Libro borrado';
    }

}
