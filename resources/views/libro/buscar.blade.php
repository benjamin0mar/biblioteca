@extends('principal.index')
	@section('titulo')
		Busqueda libros
	@endsection()
	@section('content')
				
	    <div class="sanciones_form panel panel-default ">
	    <button onclick="abrir();" class="btn btn-primary">Nuevo</button>
		<div class="container-fluid ">
		
				<table   id="example" class="table table table-hover table-result  width-all">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Autor</th>
							<th>Ejemplares</th>
							<th>Fecha publicacion</th>
							<th>Acciones</th>

						</tr>
					</thead>

					

				</table>
			<br/>	
		</div>
	</div>
	<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
	@include('libro.partials.modal-prestar')
 @endsection
 @section('script')
 <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" ></script>
<script>
	function abrir(){
		$('#form-libro')[0].reset();
	 	$('#crear').val('0');
		$('#modal').modal('show');
	}
	function eliminar(id){
		var route="./libro/"+id;
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
		alert(result);
			}
		});
	}


		/*Pasar los datos al modal*/
	function prestar(id){
		var route="./get/libro";
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
	        $("#mnombre").val(result.nombre);
			$("#mlibro").val(result.nombre);

		
			$("#mid_libro").val(result.id);

			$("#mestado_libro option[value="+result.estado_libro+"]").prop('selected', 'selected').change();

		
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
	            "targets": [ 5],
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
	    "ajax": "./api/libro_prestar",
	    'columns':[


	    	{data: 'nombre'},
	    	{data: 'descripcion'},
	    	{data: 'id_autor'},
	    		{data: 'ejemplares'},
	    	{data: 'fecha_publicacion'},
	    
	    

	    	{data: 'action'},
	    ]
	});

tableResposive("#example", 980);

  	$('#btn-addprestamo').click(function(){

  		var form=$('#form-prestamo');
  		var url=form.attr('action');
  		var divresul = "notificaciones_result";
  		var dataString = new FormData(document.getElementById("form-prestamo"));
  		var token=$("#token").val();
	     $.ajax({
		headers:{'X-CSRF-TOKEN':token},
            type: "POST",
            url: url,
            data: dataString,
            cache: false,
				contentType: false,
			processData: false,

            success: function(libro) {

            	$('#crear').val('0');
            	$('#form-prestamo')[0].reset();
       	 		$('#example').DataTable().ajax.reload();
       	 		alert(libro);
            }

        });
	});
   	

		 });




	</script>

@endsection
