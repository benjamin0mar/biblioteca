 <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridModalLabel">Libro</h4>
            </div>
            {!! Form::open(['route'=>'libro.store', 'method'=>'POST','id'=>'form-libro']) !!}
                <div class="modal-body">          

                    <div class="container-fluid bd-example-row">
                        <div class="row">                   
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Nombre</label>

                                    {!!Form::text('nombre', null,array('class'=>'form-control','id'=>'mnombre', 'placeholder'=>'Nombre(**)'))!!}                                    
                                </div>
                            </div> 
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Descripcion</label>

                                    {!!Form::text('descripcion', null,array('class'=>'form-control','id'=>'mdescripcion', 'placeholder'=>'Descripcion(*)'))!!}                                    
                                </div>
                            </div>  
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Autor</label>
                                    <select name="autor" id="mautor" class="form-control">
                                        @foreach($autores as $autor)
                                        <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                                       
                                        @endforeach
                                    </select>                                    
                                </div>
                            </div>                                                      
                           
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Fecha publicacion</label>
                                    <input type='date' class="form-control" id='mfecha_publicacion' name='fecha_publicacion' ></input>                               
                                </div>
                            </div>    

                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Fecha adquisicion</label>
                                    <input type='date' class="form-control" id='mfecha_adquisicion' name='fecha_adquisicion' ></input>                               
                                </div> 
                             </div>
                               <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for=""># Ejemplares</label>
                                    <input type='date' class="form-control" id='mejemplares' name='ejemplares' ></input>                               
                                </div> 
                             </div>
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Estado</label>
                                    <select name="estado_libro" id="mestado_libro" class="form-control">
                                        
                                        <option value="1">Nuevo</option>
                                        <option value="2">Usado</option>
                                       
                                   
                                    </select>                                    
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
                 <input type="hidden" name="id_libro" id='mid_libro'>
                <input type="hidden" id='crear' name="crear" value='0'>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btn-addlibro"  class="btn btn-primary" data-dismiss="modal">Guardar</button>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div> 
 
