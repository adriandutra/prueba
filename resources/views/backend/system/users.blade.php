@extends('backend.layouts.app')

@section('htmlheader_title')
   Usuarios

@endsection
@section('contentheader_title')
   Usuarios
@endsection

@section('content')


<div class="row">
  <div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-heading">
		<a class="btn btn-primary" style="" href="/user" >Nuevo</a>
  <div id="toolbar">
	<div class="form-inline" role="form" id="actions_dropmenu">
		<div class="dropdown" style="">
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Accciones
			<span class="caret"></span></button>
			<ul class="dropdown-menu drop-actions">
				<li style=""><a href="#" data-action="inactive"><i class="glyphicon glyphicon-ban-circle ban-circle" style="color:#d9534f;"></i> Desactivar seleccionado</a></li>
				<li style=""><a href="#" data-action="active"><i class="glyphicon glyphicon-ok icon-ok" style="color:#5cb85c;" ></i> Activar seleccionado</a></li>
				<li style=""><a href="#" data-action="restore"><i class="glyphicon glyphicon-repeat icon-repeat" style="color:#30a5ff;" ></i> Restaurar seleccionado</a></li>
				<li style=""><a href="#" data-action="delete"><i class="glyphicon glyphicon-trash icon-trash" style="color:#30a5ff;"></i> Borrar seleccionado</a></li>
			</ul>		
		</div>
	 </div>
	</div>
</div>

		<div class="panel-body">
			<table class="table-striped"
					data-toggle="table"
					data-url="{{url('api/v1/users/list') }}"
					data-show-refresh="true"
					data-show-toggle="true"
					data-show-columns="true"
					data-search="true"
					data-pagination="true"
					data-page-number="1"
					data-toolbar="#toolbar"
					data-detail-view="false"
					data-mobile-responsive="true"
					data-advanced-search="true"
					data-id-table="advancedTable"
					data-reorderable-columns="true"
					data-show-export="true"
					id="table_data"
					data-click-to-select="false"
					data-cookie="true"
					data-cookie-id-table="users"
					data-resizable="true"
			><thead>
			<tr>
				<th data-checkbox="true" ></th>
				<th data-field="id"  data-sortable="true"  data-align="center">ID</th>
				<th data-field="fullname"  data-sortable="true" data-align="center">Nombre</th>
				<th data-field="user" data-sortable="true" data-align="center">Usuario</th>
				<th data-field="email" data-sortable="true" data-align="center">Email</th>
				<th data-field="expiration_date" data-sortable="true" data-formatter="datelabel" data-align="center">Expira</th>
				<th  data-events="activeEvents" data-field="active" data-sortable="true" data-formatter="activeicon" data-align="center" >Activo</th>
				<th  data-formatter="customicon" data-searchable="false" data-switchable="false" data-align="center">Ingresos</th>
				<th  data-events="actionEvents" data-formatter="actionicons" data-searchable="false" data-switchable="false" data-align="center">Acciones</th>
			</tr>
			</thead>
		</table>		
		</div>
	  </div>
	 </div>
</div><!--/.row-->



@endsection
@section('custom-scripts')


	<script>
	var url ="/user";
	
	function customicon(value, row){
		
		html=' <a href="/accesslog/'+row.id+'"><i class="glyphicon glyphicon-calendar icon-calendar" title="Accesos"></i></a>';
		
		return html;
	}

	function actionicons(value, row) {
		
		html ='';
		
		display='display:none;'
		
		
		
			if(row.id!='1'){
	
				html+='<a href="'+url+'/'+row.id+'" title="Editar"><i class="glyphicon glyphicon-pencil icon-pencil" style="{edit_perm}"></i></a> ';
				
				if(row.trash=='1'){
					display='';
				
					html+=' <a href="#" class="delete" data-action="restore" data-id="'+row.id+'" style="{delete_perm}"><i class="glyphicon glyphicon-repeat icon-repeat" title="Restaurar"></i></a> ';
				
				}else{
					html+=' <a href="#" class="delete" data-action="delete" data-id="'+row.id+'" style="{delete_perm}"><i class="glyphicon glyphicon-trash icon-trash" title="Enviar a papelera"></i></a> ';
				}
					
				 html+=' <a href="#" class="delete totalremove" data-action="totalremove" data-id="'+row.id+'" style="'+display+' {delete_perm}"><i class="glyphicon glyphicon-remove icon-repeat" title="Eliminar"></i></a> ';
			}else{
				html+='<a href="'+url+'/'+row.id+'" title="Ver"><i class="glyphicon glyphicon-eye-open eye-open" style="{edit_perm}"></i></a> ';
			}
		
		 return html;
	}
	</script>
	<script src="{{ asset ('js/table.control.js')}}"></script>

@endsection

