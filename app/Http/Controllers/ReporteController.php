<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('reporte.index');
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
    public function getcontacto($id)
    {
        return contacto::where('dni',$id)->orWhere('ruc',$id)->first();

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $cierre=caja::where('id_user',Auth::user()->id)->where('estado','1')->first();
        if($request->get('id_registro')!='0')
        {
        $registro=registro::find($request->get('id_registro'));
        if($request->get('estado_habitacion')==5)
            {$registro->delete();
        return 'Se elimino el registro';}
        }
        else
        $registro=new registro;
       
        $registro->id_habitacion=$request->get('id_habitacion');
        $registro->fecha_entrada=$request->get('fecha_entrada');
        $registro->fecha_salida=$request->get('fecha_salida');
        $registro->hora_entrada=$request->get('hora_entrada');
        $registro->hora_salida=$request->get('hora_salida');
        $registro->datos=$request->get('datos');
        $registro->dni=$request->get('dni');
        $registro->ruc=$request->get('ruc');

        $registro->fecha_nacimiento=$request->get('fecha_nac');
        $registro->estado_civil=$request->get('estado_civil');
        $registro->nacionalidad=$request->get('nacionalidad');
        $registro->domicilio=$request->get('domicilio');
        $registro->motivo_viaje=$request->get('motivo_viaje');
        $registro->ocupacion=$request->get('ocupacion');
        $registro->telefono=$request->get('telefono');
        $registro->numero_operacion=$request->get('numero_operacion');

        $registro->total_habitacion=$request->get('total_habitacion');
        $registro->adelanto=$request->get('adelanto');
      
        $registro->id_caja=$cierre->id;

        $registro->tipo_pago=$request->get('tipo_pago');
        $registro->total_productos=$request->get('productos_total');
        $registro->importe_total=$request->get('importe_total');

        if($request->get('registro')=='1')
        $registro->estado_habitacion=$request->get('estado_habitacion');
        else
        {   
            $registro->estado_habitacion=3;
            $habitacion=habitacion::find($request->get('id_habitacion'));
            $habitacion->estado='4';
            $habitacion->save();
        }
        

        $registro->precio_habitacion=$request->get('precio_habitacion');
        
        $registro->save();

        
        if(contacto::where('dni',$request->get('dni'))->orWhere('ruc',$request->get('ruc'))->first())
        
            $contacto= contacto::where('dni',$request->get('dni'))->orWhere('ruc',$request->get('ruc'))->first();
        else $contacto = new contacto;
            $contacto->dni=$request->get('dni');
            $contacto->ruc=$request->get('ruc');
            $contacto->datos=$request->get('datos');
            $contacto->direccion=$request->get('domicilio');
            $contacto->nacionalidad=$request->get('nacionalidad');
            $contacto->ocupacion=$request->get('ocupacion');
            $contacto->telefono=$request->get('telefono');
            $contacto->fecha_nacimiento=$request->get('fecha_nac');
            $contacto->save();
        
        return 'Registro guardado correctamente';
        
    }

    //Funcion para obtener un producto
    //@Param $request -> viene el id del producto
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return 'mostrando el producto '.$id;
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
       $producto = producto::find($id);
       $producto->delete();
       return 'Producto eliminado';
    }
    public function data(){
        $orders = producto::all();        
        return \Datatables::of($orders)->addColumn('action','producto.partials.vista')->make(true);
    }
    public function get(Request $request){
      return registro::find($request->id);

    }   
}
