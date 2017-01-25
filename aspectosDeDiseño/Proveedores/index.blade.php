@extends('master')

@section('title', 'Proveedores')

@push('css-head')
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/select2/select2_conquer.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/data-tables/DT_bootstrap.css')}}"/>
<!-- END PAGE LEVEL STYLES -->
@endpush

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN STYLE CUSTOMIZER -->
			@include('customizer')
			<!-- END BEGIN STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<!--<div class="row">
				<div class="col-md-12">
					<h3 class="page-title">
					Proveedores <small>modulo para administrar Proveedores</small>
					</h3>
				</div>
			</div>-->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-truck"></i>Panel de Proveedores
							</div>
							<div class="actions">
								<div class="btn-group">
									<a class="btn btn-info dropdown-toggle" title="Columnas" href="#" data-toggle="dropdown">
									Columnas <i class="fa fa-angle-down"></i>
									</a>
									<div id="sample_2_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
										<label><input type="checkbox" checked data-column="0">Código</label>
										<label><input type="checkbox" checked data-column="1">Nombre Comercial</label>
										<label><input type="checkbox" checked data-column="2">Razón Social</label>
										<label><input type="checkbox" checked data-column="3">Teléfono Fijo</label>
										<label><input type="checkbox" checked data-column="4">Contacto</label>
										<label><input type="checkbox" checked data-column="5">País</label>
										<label><input type="checkbox" checked data-column="6">Acción</label>
									</div>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							@if(session("success"))
								@if(session("success")=="add")
									<div class="alert alert-success alert-dismissable">
										<button type="button" title="Cerrar" class="close" data-dismiss="alert" aria-hidden="true"></button>
										<strong>¡Proveedor creado correctamente!</strong> Tienes {{count($providers)}} Proveedores en el sistema. <u><strong><a href="#" class="view-data" data-role="{{session('id_proveedor')}}" >Has click aqui para ver el último proveedor que creaste</a></strong></u>
									</div>
								@endif
								@if(Session::get("success")=="edit")
									<div class="alert alert-success alert-dismissable">
										<button type="button" title="Cerrar" class="close" data-dismiss="alert" aria-hidden="true"></button>
										<strong>¡Proveedor editado correctamente!</strong> Tienes {{count($providers)}} Proveedores en el sistema. <u><strong><a href="#" class="view-data" data-role="{{session('id_proveedor')}}" >Has click aqui para ver el último proveedor que editaste</a></strong></u>
									</div>
								@endif
								@if(Session::get("success")=="delete")
									<div class="alert alert-success alert-dismissable">
										<button type="button" title="Cerrar" class="close" data-dismiss="alert" aria-hidden="true"></button>
										<strong>¡Proveedor eliminado correctamente!</strong> Tienes {{count($providers)}} Proveedoress en el sistema.
									</div>
								@endif
							@endif
							<div class="table-toolbar">
								<div class="btn-group">
									@if(in_array($tipo_permiso,[3,4,5]))
									<a id="sample_editable_1_new" title="Nueva Orden Nacional" data-role="1" class="btn btn-success option-data" data-toggle="modal" data-target="#modalProveedor">
									<!--data-toggle="modal" data-target="#miModalOC" -->
									Agregar Nuevo Proveedor <i class="fa fa-plus"></i>
									</a>
									@endif
								</div>
								<!--<div class="btn-group pull-right">
									<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Herramientas <i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">Exportar a Excel</a>
										</li>
									</ul>
								</div>-->
							</div>
							<table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
							<thead>
								<tr>
									<th class="hidden-xs" style="width:5%">Código</th>
									<th style="width:10%">Nombre Comercial</th>
									<th style="width:10%">Razón Social</th>
									<th style="width:10%">Teléfono Fijo</th>
									<th style="width:10%">Contacto</th>
									<th class="hidden-xs" style="width:10%">País</th>
									<th style="width:10%">Acción</th>
								</tr>
							</thead>
							<tbody>
							@foreach($providers as $provider)
								<tr>
									<td class="hidden-xs text-center">{{$provider->id}}</td>
									<td class="text-center">{{$provider->nombre}}</td>
									<td class="text-center">{{$provider->razon_social}}</td>
									<td class="text-center">{{$provider->telefono}}</td>
									<td class="text-center">{{$provider->contacto}}</td>
									<td class="text-center">{{$provider->country->nombre}}</td>
									<td>
										<div class="btn-toolbar margin-bottom-10">
											<div class="btn-group btn-group-sm btn-group-solid">
												@if(in_array($tipo_permiso,[1,2,3,4,5]))
													<a class="btn btn-info view-data" title="Ver" data-role="{{$provider->id}}" ><i class="fa fa-info-circle"></i></a>
												@endif
												@if(in_array($tipo_permiso,[4,5]))
													<a href="proveedores/edit/{{$provider->id}}" title="Editar" class="btn btn-warning"><i class="fa fa-edit"></i></a>
												@endif
												@if(in_array($tipo_permiso,[5]))
													<a class="btn btn-danger delete-data" title="Eliminar" data-role="{{$provider->id}}" ><i class="fa fa-trash-o"></i></a>
												@endif
											</div>
										</div>
									</td>
								</tr>
							@endforeach
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
</div>
<!-- INICIO MODAL SELECCIONAR ORDEN DE COMPRA -->
<div class="modal fade" id="modalProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" title="Cerrar" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Seleccione un Tipo de Proveedor </h4>

				<form action="proveedores/option" method="post" >
	                <div class="row">
	                    <div class="modal-body">
	                        <div class="form-group">
	                            <div class="col-md-6">
	                                <label class="control-label">Tipo (*)</label>
	                                <select required id="tipo_prove" name="tipo_prove" class="form-control select2me" data-placeholder="Select...">
	                                    <option value="">Elegir Tipo</option>
	                                    <option value="1">Crear Proveedor Nacional</option>
	                                    <option value="2">Crear Proveedor Internacional</option>
	                                </select>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="modal-footer">
	                    <button class="btn btn-default" title="Cancelar" data-dismiss="modal" aria-hidden="true">Cancelar</button>
	                    <button type="submit" title="Confirmar" class="btn btn-info btn-borrar">Confirmar</a>
	                </div>
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            </form>
			</div>
		</div>
	</div>
 </div>
 <!-- FIN MODAL SELECCIONAR ORDEN DE COMPRA -->

<!-- END CONTENT -->
<div id="modal"></div>
@endsection

@push('script-footer')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/plugins/data-tables/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/plugins/data-tables/DT_bootstrap.js')}}"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{asset('assets/scripts/app.js')}}"></script>
	<script src="{{asset('assets/scripts/table-advanced.js')}}"></script>
	<script>
	$(document).ready(function() {

		$(".option-data").click(function(){
						var data = $(this).data("role");
						$.get( "proveedores/option/" + data, function( data ) {
								$( "#modal" ).html( data );
								$( "#modalProveedor" ).modal();
						});
		});

	   $(".delete-data").click(function(){
		  var data = $(this).data("role");
		  $.get( "proveedores/delete/" + data, function( data ) {
			  $( "#modal" ).html( data );
			  $( "#modalEliminar" ).modal();
			});
		});

	    $(".view-data").click(function(){
		  var data = $(this).data("role");
		  $.get( "proveedores/view/" + data, function( data ) {
			  $( "#modal" ).html( data );
			  $( "#modalVer" ).modal();
			});
		});


	   $("#proveedores").addClass( "active" );
	   //$("#clientes-li").addClass( "active" );
	   $("#proveedores-a").append( '<span class="selected"></span>' );

	   App.init();
	   TableAdvanced.init();
	});
</script>
@endpush
