@extends('principal.index')
@section('titulo')
Prestamos
@endsection
@section('content')
       <div class="sanciones_form panel panel-default ">
		<div class="container-fluid ">
		
				<table   id="example" class="table table table-hover table-result  width-all">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Libro</th>
							<th>Fecha prestamo</th>
							<th>Fecha devolucion</th>
							<th>Dias transcurridos</th>
							<th>Estado devolucion</th>
							<th>Devolver</th>

						</tr>
					</thead>

					

				</table>
			<br/>	
		</div>
	</div>
	<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
		@include('prestamo.partials.modal-prestamo')
 @endsection
 @section('script')
 <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" ></script>
<script>
	function abrir(){
		$('#form-prestamo')[0].reset();
	 	$('#crear').val('0');
		$('#modal').modal('show');
	}
	function eliminar(id){
		var route="./productos/"+id;
		var data=id;
		var token=$("#token").val();
		var divresul = "notificaciones_result";
		$.ajax({
		headers:{'X-CSRF-TOKEN':token},
		url:route,
		data:data,
		type:'DELETE',

		success: function(result){
	 		$('#example').DataTable().ajax.reload();
			$("#"+divresul+"").html(result);
			}
		});
	}

	/*Agregar productos a tienda*/
	function aumentar(id){
	   	var nombre=$("#n"+id).text();
	   	$("#nombreprod").text('Agregar '+nombre+' a tienda');
		$("#mid_tiendaprod").val(id);
		$('#modal1').modal('show');
	    $('#crear').val('1');
	}
		/*Pasar los datos al modal*/
	function devolver(id){
		var route="./get/prestamo";
			var data={
			'id':id
		};
		var token=$("#token").val();
	     $.ajax({
		headers:{'X-CSRF-TOKEN':token},
		url:route,
		data:data,
		type:'GET',
	        success: function(result) {
	        $("#musuario").val(result.id_usuario);
			$("#mlibro").val(result.id_libro);
			$("#mfecha_prestamo").val(result.fecha_prestamo);
			$("#mfecha_devolucion").val(result.fecha_devolucion);
			$("#mestado_libro").val(result.estado_libro);
			$("#mestado_devolucion").val(result.estado_devolucion);
			$("#mid_prestamo").val(result.id);
			

			
			$('#modal').modal('show');
	        $('#crear').val('1');
	        }
		});
	}

	/*Carga todos los productos y los agrega a la tabla*/


    function tableResposive(id, size){
      if($(window).width() < size ){

          var hijos = $(id + " > thead > tr").children();
          var hijos_responsive = $(id + " > tbody > tr").children();
          var numeroFilas = $(id + " > tbody > tr").length;
          var i=0,j=0, flag = 0;

          console.log($(id).children()[1])

          while(i < hijos.length) {

            console.log(hijos_responsive.eq(j).text());

            hijos_responsive.eq(j).html("<b>"+hijos.eq(i).text()+": </b>"+hijos_responsive.eq(j).text())
            i++;
            j++;
            if(i===(hijos_responsive.length/numeroFilas) && flag <= (hijos_responsive.length/numeroFilas)-1){
              i=0;
              flag++;
            }

          }
        $(id + "> thead").css({
          "display" : "none"
        });
        $(id + "> tbody tr").css({
          "display" : "flex",
          "flex-direction" : "column",
          "position": "relative"
        });

        $(id + "> tbody tr td ").css({
          "font-size" : "12px",
          "display": "flex",
          "justify-content": "space-between",
          "align-items": "center",
          "position": "absolute",
          "opacity": "0",
          "z-index": "-1"
        });

        $(id + "> tbody tr td:first-child ").css({
          "position": "relative",
          "z-index": "1",
          "background-color": "whitesmoke",
          "opacity": "1"
        });

        var active = true;

            // $(id).css({
            //  "width": "100%"
            // })

          $(id + "> tbody tr td:first-child ").click(function(){
            if(active==true){
            $(this).parent().css({
              "border" : "1px solid #cecece"
            });
            $(this).siblings().css({
              "position": "relative",
              "opacity": "1",
              "z-index": "1"

            })
            active = false;
          }else{
            $(this).parent().css({
              "border" : "none"
            });
            $(this).siblings().css({
              "position": "absolute",
              "opacity": "0"

            })
            active = true;
          }
          });


      }

    }

	$(document).ready(function() {


  	/*Para el registro de nuevo producto o edicion*/
  	$('#example').DataTable( {
	    "processing": true,
	    "serverSide": true,
	    'bFilter':true,
	    "columnDefs": [
	        {
	            "targets": [ 5 ],
	            "visible": true,
	            "searchable": false
	        },


	    ]  , "oLanguage": {
	           		"oPaginate": {
	 					"sNext": "Siguiente",
	 					"sPrevious": "Anterior",
	           		},
	            	"sSearch": "Buscar"	,
	            	"sInfo": " Mostrando _START_ a _END_ de _TOTAL_ entidades",
	            	"sLengthMenu": "Mostrar _MENU_ resultados por página",
	            	"sInfoFiltered": " - filtrando de _MAX_ resultados"
	         	},
	    "ajax": "./api/prestamo",
	    'columns':[


	    	{data: 'id_usuario'},
	    	{data: 'id_libro'},
	    	{data: 'fecha_prestamo'},
	    	{data: 'fecha_devolucion'},
	    	{data: 'dias_transcurridos'},
	    	{data: 'estado_devolucion'},

	    	{data: 'action'},
	    ]
	});

tableResposive("#example", 980);

  	$('#btn-addproducto').click(function(){

  		var form=$('#form-producto');
  		var url=form.attr('action');
  		var divresul = "notificaciones_result";
  		var dataString = new FormData(document.getElementById("form-producto"));
  		$.ajax({
            type: "POST",
            url: url,
            data: dataString,
            cache: false,
				contentType: false,
			processData: false,

            success: function(producto) {

            	$('#crear').val('0');
            	$('#form-producto')[0].reset();
       	 		$('#example').DataTable().ajax.reload();
       	 		$("#"+divresul+"").html(producto);
            }

        });
	});
   	$('#btn-addtiendaprod').click(function(){

  		var form=$('#form-tiendaprod');
  		var url=form.attr('action');
  		var divresul = "notificaciones_result";

  		var dataString = new FormData(document.getElementById("form-tiendaprod"));
  		 $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            cache: false,
			contentType: false,
			processData: false,

            success: function(result) {
        		$("#"+divresul+"").html(result);
            	$('#form-tiendaprod')[0].reset();
            	$('#example').DataTable().ajax.reload();
            }
        });
		});


		 });




	</script>

@endsection
