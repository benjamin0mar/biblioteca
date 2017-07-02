@extends('principal.index')
    @section('titulo')
        Sanciones
    @endsection()
    @section('content')
                
    <div class="sanciones_form panel panel-default ">
		<div class="container-fluid ">
				<br/>	
			<input type="date"  class="form-control" placeholder="fecha inicial"></input>
			<br/>	
			<input type="date"  class="form-control" placeholder="fecha actual"></input>
			<br/>	
			<input type="text"  class="form-control" placeholder="monto"></input>
			<br/>	
			<select class="form-control">
				<option>tipo #1</option>
				<option>tipo #2</option>
			</select>
			<br/>	
		</div>
	</div>
    @endsection()
    @section('script')      
    
        
    @endsection()   