<style>
	.editar{
		font-size: 18px;
		padding-left: 15px;
		padding-right: 15px;
		color: green;
	}
	.eliminar{
		font-size: 18px;
		padding-left: 15px;
		padding-right: 15px;
		color: red;
	}
</style>
<a href="#" id={{$id}} class="editar" OnClick="editar(this.id);"><i class=" fa fa-pencil"></i></a>
<a href="#" id={{$id}} class="eliminar" OnClick="eliminar(this.id);"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

