 <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridModalLabel">Libro</h4>
            </div>
            {!! Form::open(['route'=>'user.store', 'method'=>'POST','id'=>'form-prestamo']) !!}
                <div class="modal-body">          

                    <div class="container-fluid bd-example-row">
                        <div class="row">                   
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Nombre</label>

                                    {!!Form::text('usuario', null,array('class'=>'form-control','id'=>'musuario', 'placeholder'=>'Nombre(**)','readonly'=>'readonly'))!!}                                    
                                </div>
                            </div> 
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Libro</label>

                                    {!!Form::text('libro', null,array('class'=>'form-control','id'=>'mlibro', 'readonly'=>'readonly'))!!}                                    
                                </div>
                            </div>  
                                                                        
                            
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Fecha prestamo</label>
                                    <input type='text' class="form-control" readonly="readonly"  id='mfecha_prestamo' name='fecha_prestamo' ></input>                               
                                </div>
                            </div>    
                              <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Fecha devolucion</label>
                                    <input type='text' class="form-control" readonly="readonly"  id='mfecha_devolucion' name='fecha_devolucion' ></input>                               
                                </div>
                            </div>  
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Estado libro</label>
                                    <input type='text' class="form-control" readonly="readonly"  id='mestado_libro' name='estado_libro' ></input>                               
                                </div> 
                             </div>
                               <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Estado devolucion</label>
                                    <input type='text' class="form-control" readonly="readonly" id='mestado_devolucion' name='estado_devolucion' ></input>                               
                                </div> 
                             </div>
                                <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Descripcion </label>
                                    <input type='text' class="form-control" id='mdescripcion' name='descripcion' ></input>                               
                                </div> 
                             </div>
                        </div>
                    </div>
                </div>
                 <input type="hidden" name="id_prestamo" id='mid_prestamo'>
                <input type="hidden" id='crear' name="crear" value='0'>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btn-addprestamo"  class="btn btn-primary" data-dismiss="modal">Guardar</button>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div> 
 
