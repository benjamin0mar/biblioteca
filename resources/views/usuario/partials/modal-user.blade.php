 <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridModalLabel">Libro</h4>
            </div>
            {!! Form::open(['route'=>'user.store', 'method'=>'POST','id'=>'form-user']) !!}
                <div class="modal-body">          

                    <div class="container-fluid bd-example-row">
                        <div class="row">                   
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Nombre</label>

                                    {!!Form::text('name', null,array('class'=>'form-control','id'=>'mnombre', 'placeholder'=>'Nombre(**)'))!!}                                    
                                </div>
                            </div> 
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Correo electronico</label>

                                    {!!Form::text('email', null,array('class'=>'form-control','id'=>'memail', 'placeholder'=>'Email(*)'))!!}                                    
                                </div>
                            </div>  
                                                                        
                             <div class="form-group col-xs-11 col-margins">
                                   <input type="password" name="password" class="form-control" id="mpassword" placeholder="Contraseña">
                                </div>
                                  <br>
                                <div class="form-group col-xs-11 col-margins">
                                     <input type="password" name="password_2" class="form-control" id="mpasswordc" placeholder="Confirmar contraseña">

                                </div>
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">DNI</label>
                                    <input type='text' class="form-control" id='mdni' name='dni' ></input>                               
                                </div>
                            </div>    
                             <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Fecha nacimiento</label>
                                    <input type='date' class="form-control" id='mfecha_nacimiento' name='fecha_nacimiento' ></input>                               
                                </div> 
                             </div>
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Direccion</label>
                                    <input type='text' class="form-control" id='mdireccion' name='direccion' ></input>                               
                                </div> 
                             </div>
                               <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Telefono</label>
                                    <input type='text' class="form-control" id='mtelefono' name='telefono' ></input>                               
                                </div> 
                             </div>
                            <div class="form-group col-xs-11 col-margins">
                                <div class="inner-addon right-addon">                    
                                    <label for="">Tipo</label>
                                    <select name="tipo" id="mtipo" class="form-control">
                                        
                                        <option value="1">Usuario</option>
                                        <option value="2">Trabajador</option>
                                        <option value="3">Administrador</option>
                                       
                                   
                                    </select>                                    
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
                 <input type="hidden" name="id_user" id='mid_user'>
                <input type="hidden" id='crear' name="crear" value='0'>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btn-adduser"  class="btn btn-primary" data-dismiss="modal">Guardar</button>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div> 
 
