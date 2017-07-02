 <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridModalLabel">Prestamo</h4>
            </div>
            {!! Form::open(['route'=>'prestamo.store', 'method'=>'POST','id'=>'form-prestamo']) !!}
                <div class="modal-body">          

                    <div class="container-fluid bd-example-row">
                        <div class="row">                   
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Nombre</label>

                                   <input type='text'class='form-control'  readonly='readonly' value='{{Auth::user()->name}}'>
                                </div>
                            </div> 
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">DNI</label>

                                   <input type='text' class='form-control' readonly='readonly' value='{{Auth::user()->dni}}'>
                                </div>
                            </div>  
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Libro</label>

                                   <input type='text' class='form-control' id='mlibro' name='libro' readonly='readonly' value=''>
                                </div>
                            </div>  
                             <div class="form-group col-xs-11  col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Estado</label>
                                    <select name="estado_libro" id="mestado_libro" class="form-control">
                                        
                                        <option value="1">Nuevo</option>
                                        <option value="2">Usado</option>
                                       
                                   
                                    </select>                                    
                                </div>
                            </div>        
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Fecha devolucion</label>
                                    <input type='date' class="form-control" id='mfecha_devolucion' name='fecha_devolucion' ></input>                               
                                </div> 
                             </div>
                              
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Descripcion</label>
                                   <input type='text' class='form-control' placeholder='Descripcion' id='mdescripcion' name='descripcion'>                                   
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
                 <input type="hidden" name="id_libro" id='mid_libro'>
                <input type="hidden" id='crear' name="crear" value='0'>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btn-addprestamo"  class="btn btn-primary" data-dismiss="modal">Guardar</button>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div> 
 
