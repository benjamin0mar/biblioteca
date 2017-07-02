@extends('principal.index')
	@section('titulo')
		Escuela
	@endsection()
	@section('content')
				
	    <div class="sanciones_form panel panel-default ">
		<div class="container-fluid ">
				<br/>	
			<input type="text"  class="form-control" placeholder="Nombre"></input>
			<br/>
			<select class="form-control">
				<option>-Seleccionar-</option>
				<option>Facutad 1</option>
				<option>Facultad2</option>
			</select>	
			<br/>	
		</div>
	</div>
	
	@endsection()
	@section('script')		
	
		
	@endsection()