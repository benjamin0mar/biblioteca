@extends('principal.index')
	@section('titulo')
		Reportes
	@endsection()
	@section('content')
				
		<div class="panel panel-default">		
	  		<div class="panel-body">
	  			<a href="{{url('reportes/libro')}}">Libros</a>
			</div>
		</div>
		<div class="panel panel-default">		
	  		<div class="panel-body">
	  			<a href="{{URL::to('reportes/user')}}">Usuarios</a>
			</div>
		</div>
		
		<div class="panel panel-default">		
	  		<div class="panel-body">
	  			<a href="{{URL::to('reportes/categoria')}}">Categoria</a>
			</div>
		</div>
	
	@endsection()
	@section('script')		
	
	@endsection()