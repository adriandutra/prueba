@extends('backend.layouts.app')

@section('htmlheader_title')
   Media Servers

@endsection


@section('content')

                             <div class="module">
                                <div class="module-head">
                                    <h3>
                                        1. Listado</h3>
                                </div>
                                <div class="module-body table">
                               <table class="datatable-1 table table-bordered table-striped  display dataTable" 
						data-toggle="table" 
						data-url="{{url('api/v1/prueba/listado4') }}"  
						data-show-refresh="false" 
						data-show-toggle="false" 
						data-show-columns="true" 
						data-search="false" 
						data-pagination="true" 
						data-show-refresh="false" 
						
						data-page-number="1" 
						data-detail-view="false"
						data-mobile-responsive="true"
						data-advanced-search="false"
						data-id-table="advancedTable"
						data-reorderable-columns="false"
						data-show-export="{export_perm}"
						id="table_data"
						data-click-to-select="false"
						data-cookie="true"
               			data-cookie-id-table="roles"
               			data-resizable="true"
						 ><thead>
						    <tr>
						        
						        <th data-field="cantidad"  data-sortable="true" data-align="center">Cantidad de registros totales</th>
						  
						    </tr>
						    </thead>
						</table>			
                                </div>
                            </div>
                            <!--/.module-->
                            
                                                     <div class="module">
                                <div class="module-head">
                                    <h3>
                                        2. Listado</h3>
                                </div>
                                <div class="module-body table">
                                                          <table class="datatable-1 table table-bordered table-striped  display dataTable" 
						data-toggle="table" 
						data-url="{{url('api/v1/prueba/listado5') }}"  
						data-show-refresh="false" 
						data-show-toggle="false" 
						data-show-columns="true" 
						data-search="false" 
						data-pagination="true" 
						data-show-refresh="false" 
						
						data-page-number="1" 
						data-detail-view="false"
						data-mobile-responsive="true"
						data-advanced-search="false"
						data-id-table="advancedTable"
						data-reorderable-columns="false"
						data-show-export="{export_perm}"
						id="table_data"
						data-click-to-select="false"
						data-cookie="true"
               			data-cookie-id-table="roles"
               			data-resizable="true"
						 ><thead>
						    <tr>
						        
						        <th data-field="edad"  data-sortable="true" data-align="center">Edad Promedio</th>
						        
						    </tr>
						    </thead>
						</table>			
                                </div>
                            </div>
                                <!--/.module-->
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        3. Listado</h3>
                                </div>
                                <div class="module-body table">
                       <table class="datatable-1 table table-bordered table-striped  display dataTable" 
						data-toggle="table" 
						data-url="{{url('api/v1/prueba/listado1') }}"  
						data-show-refresh="false" 
						data-show-toggle="false" 
						data-show-columns="true" 
						data-search="false" 
						data-pagination="true" 
						data-show-refresh="false" 
						
						data-page-number="1" 
						data-detail-view="false"
						data-mobile-responsive="true"
						data-advanced-search="false"
						data-id-table="advancedTable"
						data-reorderable-columns="false"
						data-show-export="{export_perm}"
						id="table_data"
						data-click-to-select="false"
						data-cookie="true"
               			data-cookie-id-table="roles"
               			data-resizable="true"
						 ><thead>
						    <tr>
						        
						        <th data-field="nombre"  data-sortable="true" data-align="center">Nombre</th>
						        
						       	<th data-field="edad"  data-sortable="true" data-align="center">Edad</th>
						       	
						       	<th data-field="equipo"  data-sortable="true" data-align="center">Equipo</th>
						       	
						    </tr>
						    </thead>
						</table>
                                </div>
                            </div>
                            <!--/.module-->
                            
                                                        <div class="module">
                                <div class="module-head">
                                    <h3>
                                        4. Listado</h3>
                                </div>
                                <div class="module-body table">
                                     						<table class="datatable-1 table table-bordered table-striped  display dataTable" 
						data-toggle="table" 
						data-url="{{url('api/v1/prueba/listado2') }}"  
						data-show-refresh="true" 
						data-show-toggle="true" 
						data-show-columns="true" 
						data-search="false" 
						data-pagination="true" 
						data-show-refresh="false" 
						
						data-page-number="1"  
						data-toolbar="#toolbar"
						data-detail-view="false"
						data-mobile-responsive="true"
						data-advanced-search="false"
						data-id-table="advancedTable"
						data-reorderable-columns="true"
						data-show-export="{export_perm}"
						id="table_data"
						data-click-to-select="false"
						data-cookie="true"
               			data-cookie-id-table="roles"
               			data-resizable="true"
						 ><thead>
						    <tr>
						        
						        <th data-field="nombre"  data-sortable="true" data-align="center">Nombre</th>
						        
						       	<th data-field="numero"  data-sortable="true" data-align="center">Repeticiones</th>
 				            </tr>
						    </thead>
						</table>
                                </div>
                            </div>
                            <!--/.module-->
                            
                                                       <div class="module">
                                <div class="module-head">
                                    <h3>
                                        5. Listado</h3>
                                </div>
                                <div class="module-body table">
                                     						<table class="datatable-1 table table-bordered table-striped  display dataTable" 
						data-toggle="table" 
						data-url="{{url('api/v1/prueba/listado3') }}"  
						data-show-refresh="true" 
						data-show-toggle="true" 
						data-show-columns="true" 
						data-search="false" 
						data-pagination="true" 
						data-show-refresh="false" 
						
						data-page-number="1"  
						data-toolbar="#toolbar"
						data-detail-view="false"
						data-mobile-responsive="true"
						data-advanced-search="false"
						data-id-table="advancedTable"
						data-reorderable-columns="true"
						data-show-export="{export_perm}"
						id="table_data"
						data-click-to-select="false"
						data-cookie="true"
               			data-cookie-id-table="roles"
               			data-resizable="true"
						 ><thead>
						    <tr>
						        
						        <th data-field="equipo"  data-sortable="true" data-align="center">Equipo</th>
						        
						       	<th data-field="socios"  data-sortable="true" data-align="center">Cantidad</th>
						       	
						       	<th data-field="edad"  data-sortable="true" data-align="center">Promedio</th>
						       	
						       	<th data-field="minimo"  data-sortable="true" data-align="center">Minimo</th>
						       	
						       	<th data-field="maximo"  data-sortable="true" data-align="center">Maximo</th>
						    </tr>
						    </thead>
						</table>
                                </div>
                            </div>
                            <!--/.module--> 


<script type="text/javascript">


function performClick(elemId) {
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
      var evt = document.createEvent("MouseEvents");
      evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
     
   }
   var filename = $('#theFile')[0].files.length ? $('#theFile')[0].files[0].name : "";
   $('#namefile').text(filename);
}



</script>

@endsection
