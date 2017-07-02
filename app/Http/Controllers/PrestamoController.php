<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use  App\libro;
use  App\prestamo;
use  App\user;
use Auth;
use Datetime;
class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      
       return view('prestamo.index');
    }
    public function indexbusqueda()
    {   
      
       return redirect('/');
    }
    public function indexusuario()
    {
        return view('usuario.prestamos');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return View::make('producto.partial.modal-producto');

    }

    public function data()
    {
        $orders=prestamo::where('estado','1')->get();
        foreach ($orders as $key => $value) {
            $value->id_usuario=user::find($value->id_usuario)->name.'-'.user::find($value->id_usuario)->dni;
            $value->id_libro=libro::find($value->id_libro)->nombre;
            $date1=new Datetime($value->fecha_prestamo);
            $actual=new Datetime;
            $dias_transcurridos=$date1->diff($actual);
           
            $value->dias_transcurridos=$dias_transcurridos->format('%a');
            if($value->estado_devolucion==1)
                $value->estado_devolucion='A tiempo';
            elseif($value->estado_devolucion==2)
                $value->estado_devolucion='Tardanza';
            else $value->estado_devolucion='Tardanza con sancion';
        }
        return \Datatables::of($orders)->addColumn('action', 'prestamo.partials.vista')->make(true) ; 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {   

        $prestamo= new prestamo;
        $prestamo->id_usuario=Auth::user()->id;
        $prestamo->id_libro=$request->id_libro;
        $prestamo->fecha_prestamo=new Datetime;
        $fechaDev=new Datetime($request->get('fecha_devolucion'));
        $prestamo->fecha_devolucion= $fechaDev->format('Y-m-d');
        $prestamo->estado_libro=$request->estado_libro;
        $prestamo->estado=1;
        $prestamo->descripcion_usuario=$request->get('descripcion');
        $prestamo->estado_devolucion=1;
        $prestamo->save();
        return 'Prestamo exitoso';
        
    }

    //Funcion para obtener una habitacion
    //@Param $request -> viene el id de la habitacion
    public function get(Request $request)
    {   
        $prestamo=prestamo::find($request->get('id'));
            $prestamo->id_usuario=user::find($prestamo->id_usuario)->name.'-'.user::find($prestamo->id_usuario)->dni;
            $prestamo->id_libro=libro::find($prestamo->id_libro)->nombre;
         $date1=new Datetime($request->fecha_prestamo);
            $actual=new Datetime;
            $dias_transcurridos=$date1->diff($actual);
           
            $prestamo->dias_transcurridos=$dias_transcurridos->format('%a');
            if($prestamo->estado_devolucion==1)
                $prestamo->estado_devolucion='A tiempo';
            elseif($prestamo->estado_devolucion==2)
                $prestamo->estado_devolucion='Tardanza';
            else $prestamo->estado_devolucion='Tardanza con sancion';
        return $prestamo;
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
      
    }

     
}
