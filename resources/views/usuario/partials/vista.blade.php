<style>
.accion{
	display: none;
}
.editar:hover .accion{
	display: inline-block;
	position: absolute;
	background-color: white;
	padding-left: 5px;
	font-size: 18px;
}
.eliminar:hover .accion{
	display: inline-block;
	position: absolute;
	background-color: white;
	font-size: 18px;
	padding-left: 5px;
}
.ver:hover .accion{
	display: inline-block;
	position: absolute;
	background-color: white;
	font-size: 18px;
	padding-left: 5px;
}
.aumentar:hover .accion{
	display: inline-block;
	position: absolute;
	background-color: white;
	font-size: 18px;
	padding-left: 5px;
}
</style>

<a href="#" id={{$id}} class="editar" OnClick="editar(this.id);" style="color: #4d5158;"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;<i class="accion">editar</i></a>

<a href="#"  id={{$id}} class="eliminar" OnClick="eliminar(this.id);"  style="color:#fb4242;"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;<i class="accion">borrar</i></a>

