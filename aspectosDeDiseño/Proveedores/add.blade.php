@extends('master')

@section('title', 'Proveedores Agregar')

@push('css-head')
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/select2/select2_conquer.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/data-tables/DT_bootstrap.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}"/>
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
					Proveedores <small>Agregar Proveedores</small>
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
								<i class="fa fa-truck"></i>Panel de Agregar Proveedores
							</div>
						</div>

						<div class="portlet-body form">
							<form id="form-proveedor" name="form-proveedor" action="add" method="post" enctype="multipart/form-data" class="horizontal-form">

								<div class="form-body">
									@if ($errors->any())
										<div class="note note-danger">
											<h4 class="block">Debe Completar los siguientes campos:</h4>
											<ul>
															@foreach ($errors->all() as $error)
																<li>{{ $error }}</li>
															@endforeach
													</ul>
										</div>
									@endif
							@if($tipoProve == 1)

										<input type="hidden" id="tipo_prove" name="tipo_prove" class="form-control" value="{{ $tipoProve }}">
										<h3 class="form-section">Agregar Proveedores</h3>
										<div class="row">

											<div class="col-md-3" id="displayrut">
												<div class="form-group">
													<label class="control-label">Rut (*)</label>
													<input type="text" id="rut" name="rut" class="form-control" placeholder="12.345.678-9" value="" >
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
													<label class="control-label">Nombre Comercial. (*)</label>
													<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ej: Industrias Textiles" value="{{ old('nombre') }}" data-provide="typeahead" data-items="4" data-source="[{{$proveedores}}]" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group{{ $errors->has('razon_social') ? ' has-error' : '' }}">
													<label class="control-label">Razón Social. (*)</label>
													<input type="text" id="razon_social" name="razon_social" class="form-control" placeholder="Ej: Industrias Stark S.A." value="{{ old('razon_social') }}" data-provide="typeahead" data-items="4" data-source="[{{$proveedores}}]" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
													<label class="control-label">Dirección. (*)</label>
													<input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ej: Pasaje azul #1234." value="{{ old('direccion') }}" data-provide="typeahead" data-items="4" data-source="[{{$proveedores}}]" >
												</div>
											</div>
											<div class="col-md-3" id='campo-nacional-1'>
												<div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
													<label class="control-label">Región.(*) </label>
													<select  id="region" name="region" class="form-control  select2me" data-placeholder="ELEGIR REGIÓN">
														<option value="">ELEGIR REGIÓN</option>
														@foreach($regiones as $region)
															<option value="{{$region->id}}">{{$region->nombre}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
													<label class="control-label">Ciudad. (*)</label>
													<select  id="ciudad" name="ciudad" class="form-control  select2me" data-placeholder="ELEGIR CIUDAD">
														<option value="">ELEGIR CIUDAD</option>
														@foreach($cities as $city)
															<option value="{{$city->id}}">{{$city->nombre}}</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group{{ $errors->has('comuna') ? ' has-error' : '' }}">
													<label class="control-label">Comuna. (*)</label>
													<select  id="comuna" name="comuna" class="form-control  select2me" data-placeholder="ELEGIR COMUNA">
														<option value="">ELEGIR COMUNA</option>
														@foreach($comunes as $comune)
															<option value="{{$comune->id}}">{{$comune->nombre}}</option>
														@endforeach
													</select>
												</div>
											</div>

											<input type="hidden" id="origen" name="origen" class="form-control" value="46" >

										</div>



										<!--/row-->
										<!--/row-->
										<h3 class="form-section">Agregar Datos de Contacto</h3>
										<div class="row">

											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Télefono Fijo de Contacto(*)</label>
													<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Ej: 22600700" value="{{ old('telefono') }}" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Télefono Celúlar de Contacto(*)</label>
													<input type="text" id="celular" name="celular" class="form-control" placeholder="Ej: 97891812" value="{{ old('celular') }}" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Email Empresa(*)</label>
													<input type="text" id="email_empresa" name="email_empresa"  class="form-control mayusculas" placeholder="Ej: ppueblas@empresa.cl" value="{{ old('email_empresa') }}" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Nombre de Contacto(*)</label>
													<input type="text" id="contacto" name="contacto" class="form-control" placeholder="Ej: Pedro Pueblas" value="{{ old('contacto') }}" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Email de Contacto(*)</label>
													<input type="email" id="correo" name="correo"  class="form-control mayusculas" placeholder="Ej: papueblas@gmail.cl" value="{{ old('correo') }}" >
												</div>
											</div>
										</div>
										<h3 class="form-section">Agregar Datos Bancarios</h3>
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Nombre Beneficiario(*)</label>
													<input type="text" id="nombre_beneficiario" name="nombre_beneficiario"  class="form-control mayusculas" placeholder="Ej: Ramón Valdez" value="{{ old('nombre_beneficiario') }}" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Rut Beneficiario(*)</label>
													<input type="text" id="rut_beneficiario" name="rut_beneficiario"  class="form-control mayusculas" placeholder="12.345.678-9" value="{{ old('rut_beneficiario') }}" >
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Número de Cuenta(*)</label>
													<input type="text" id="nro_cuenta" name="nro_cuenta"  class="form-control mayusculas" placeholder="Ej: 666111223" value="{{ old('nro_cuenta') }}" >
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Banco(*)</label>
													<input type="text" id="banco" name="banco"  class="form-control mayusculas" placeholder="Ej: Banco Estado" value="{{ old('banco') }}" >
												</div>
											</div>
											<input type="hidden" id="moneda" name="moneda"  class="form-control mayusculas" value="1">

											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Tipo de Cuenta(*)</label>
													<input type="text" id="tipo_cuenta" name="tipo_cuenta"  class="form-control mayusculas" placeholder="Ej: CORRIENTE" value="{{ old('tipo_cuenta') }}" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Forma de Pago(*)</label>
													<select  id="forma_pago" name="forma_pago" class="form-control select2me" data-placeholder="Select...">
														<option value="">ELEGIR FORMA DE PAGO</option>
														@foreach($condicion_pago as $condicion_de_pago)
															<option value="{{$condicion_de_pago->id}}">{{$condicion_de_pago->condicion}}</option>
														@endforeach
													</select>
												</div>
											</div>

										</div>
										<h3 class="form-section">Agregar Datos Adicionales</h3>
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Página Web(*)</label>
													<input type="text" id="pagina_web" name="pagina_web"  class="form-control mayusculas" placeholder="Ej: www.miempresa.com" value="{{ old('pagina_web') }}" >
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Información Página Web</label>
													<textarea id="info_web" name="info_web"  class="form-control mayusculas" placeholder="Ej: PÁGINA CORPORATIVA" value="{{ old('info_web') }}" ></textarea>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="control-label">Usuario Pagina Web</label>
													<input type="text" id="usuario_pagina" name="usuario_pagina"  class="form-control mayusculas" placeholder="Ej: camila6" value="{{ old('usuario_pagina') }}">
												</div>
											</div>
											<div class="col-md-3" >
												<div class="form-group">
													<label class="control-label">Login</label>
													<input type="password" id="login" name="login" class="form-control mayusculas" placeholder="Ej: 12345(******)" value="{{ old('login') }}">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">Comentarios</label>
													<textarea id="comentarios" name="comentarios" class="form-control mayusculas" placeholder="Ej: Encargo de envio retrasado..." value="{{ old('comentarios') }}" ></textarea>
												</div>
											</div>
										</div>
										<!--/row-->

								<!-- END FORM-->

							@endif

							@if($tipoProve == 2)

									<input type="hidden" id="tipo_prove" name="tipo_prove" class="form-control" value="{{ $tipoProve }}">
									<h3 class="form-section">Agregar Proveedores</h3>
									<div class="row">

										<div class="col-md-3" id="campo-internacional-1">
											<div class="form-group{{ $errors->has('tax_id') ? ' has-error' : '' }}">
												<label class="control-label">Tax ID.</label>
												<input type="text" id="id_tax" name="id_tax" class="form-control" placeholder="Ej: B12BB456" value="{{ old('id_tax') }}" >
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
												<label class="control-label">Nombre Comercial. (*)</label>
												<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ej: Industrias Textiles" value="{{ old('nombre') }}" data-provide="typeahead" data-items="4" data-source="[{{$proveedores}}]" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group{{ $errors->has('razon_social') ? ' has-error' : '' }}">
												<label class="control-label">Razón Social. (*)</label>
												<input type="text" id="razon_social" name="razon_social" class="form-control" placeholder="Ej: Industrias Stark S.A." value="{{ old('razon_social') }}" data-provide="typeahead" data-items="4" data-source="[{{$proveedores}}]" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
												<label class="control-label">Dirección. (*)</label>
												<input type="text" id="direccion" name="direccion" class="form-control" placeholder="Ej: Pasaje azul #1234." value="{{ old('direccion') }}" data-provide="typeahead" data-items="4" data-source="[{{$proveedores}}]" >
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
												<label class="control-label">Ciudad. (*)</label>
												<input type="text" id="ciudad_in" name="ciudad_in" class="form-control" placeholder="Ej: Santiago." value="{{ old('ciudad') }}" data-provide="typeahead" data-items="4" data-source="[{{$proveedores}}]" >
											</div>
										</div>
										<input type="hidden" id="rut" name="rut" class="form-control" placeholder="12.345.678-9" value="0" >
										<div class="col-md-3" id='campo-nacional-1'>
											<div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
												<label class="control-label">Región. </label>
												<input type="text" id="region_in" name="region_in" class="form-control" placeholder="Ej: I Región." value="{{ old('region') }}" data-provide="typeahead" data-items="4" data-source="[{{$proveedores}}]">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group{{ $errors->has('origen') ? ' has-error' : '' }}">
												<label class="control-label">Pais (*)</label>
												<select  id="origen" name="origen" class="form-control  select2me" data-placeholder="Elegir Origen">
													<option value="">ELEGIR PAÍS</option>
													@foreach($countries as $country)
														<option value="{{$country->id}}">{{$country->nombre}}</option>
													@endforeach
												</select>
											</div>
										</div>

										<div class="col-md-3" id="campo-internacional-2">
											<div class="form-group{{ $errors->has('codigo_postal') ? ' has-error' : '' }}">
												<label class="control-label">Código Postal. (*)</label>
												<input type="text" id="codigo_postal" name="codigo_postal" class="form-control" placeholder="Ej: 8743435." value="{{ old('codigo_postal') }}" data-provide="typeahead" data-items="4" data-source="[{{$proveedores}}]" >
											</div>
										</div>
									</div>

									<!--/row-->
									<h3 class="form-section">Agregar Datos de Contacto</h3>
									<div class="row">

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Télefono Fijo de Contacto(*)</label>
												<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Ej: 22600700" value="{{ old('telefono') }}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Télefono Celúlar de Contacto(*)</label>
												<input type="text" id="celular" name="celular" class="form-control" placeholder="Ej: 97891812" value="{{ old('celular') }}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Email Empresa(*)</label>
												<input type="email" id="email_empresa" name="email_empresa"  class="form-control mayusculas" placeholder="Ej: ppueblas@empresa.cl" value="{{ old('email_empresa') }}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Nombre de Contacto(*)</label>
												<input type="text" id="contacto" name="contacto" class="form-control" placeholder="Ej: Pedro Pueblas" value="{{ old('contacto') }}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Email de Contacto(*)</label>
												<input type="email" id="correo" name="correo"  class="form-control mayusculas" placeholder="Ej: papueblas@gmail.cl" value="{{ old('correo') }}" >
											</div>
										</div>
									</div>
									<h3 class="form-section">Agregar Datos Bancarios</h3>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Nombre Beneficiario(*)</label>
												<input type="text" id="nombre_beneficiario" name="nombre_beneficiario"  class="form-control mayusculas" placeholder="Ej: Ramón Valdez" value="{{ old('nombre_beneficiario') }}" >
											</div>
										</div>

										<div class="col-md-3" id="campo-internacional-3">
											<div class="form-group">
												<label class="control-label">Dirección Beneficiario Banco(*)</label>
												<input type="text" id="direccion_beneficiario_banco" name="direccion_beneficiario_banco"  class="form-control mayusculas" placeholder="Ej: Huerfanos #2141" value="{{ old('direccion_beneficiario_banco') }}" >
											</div>
										</div>
										<div class="col-md-3" id="campo-internacional-4">
											<div class="form-group">
												<label class="control-label">Dirección del Banco(*)</label>
												<input type="text" id="direccion_banco" name="direccion_banco"  class="form-control mayusculas" placeholder="Ej: Huerfanos #2141" value="{{ old('direccion_banco') }}" required='required'>
											</div>
										</div>
										<div class="col-md-3" id="campo-internacional-5">
											<div class="form-group">
												<label class="control-label">Código Swif(*)</label>
												<input type="text" id="codigo_swif" name="codigo_swif"  class="form-control mayusculas" placeholder="Ej: De 12 a 15 carácteres" value="{{ old('codigo_swif') }}"  minlength="12" maxlength="15">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Número de Cuenta(*)</label>
												<input type="text" id="nro_cuenta" name="nro_cuenta"  class="form-control mayusculas" placeholder="Ej: 666111223" value="{{ old('nro_cuenta') }}" >
											</div>
										</div>
										<div class="col-md-3" id="campo-internacional-6">
											<div class="form-group">
												<label class="control-label">Código ABA</label>
												<input type="text" id="codigo_aba" name="codigo_aba"  class="form-control mayusculas" placeholder="Ej: 12345678912345678912" value="{{ old('codigo_aba') }}"  maxlength="20">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Banco(*)</label>
												<input type="text" id="banco" name="banco"  class="form-control mayusculas" placeholder="Ej: Banco Estado" value="{{ old('banco') }}" >
											</div>
										</div>
										<div class="col-md-3" id="campo-internacional-7">
											<div class="form-group">
												<label class="control-label">Banco Intermediario</label>
												<input type="text" id="banco_intermediario" name="banco_intermediario"  class="form-control mayusculas" placeholder="Ej: Itaú" value="{{ old('banco_intermediario') }}">
											</div>
										</div>

										<div class="col-md-3" id="campo-internacional-8">
											<div class="form-group">
												<label class="control-label">Dirección Banco Intermediario</label>
												<input type="text" id="direccion_banco_intermediario" name="direccion_banco_intermediario"  class="form-control mayusculas" placeholder="Ej: Calle Balmaceda #3214" value="{{ old('direccion_banco_intermediario') }}">
											</div>
										</div>
										<div class="col-md-3" id="campo-internacional-9">
											<div class="form-group">
												<label class="control-label">Codigo ABA Banco Intermediario</label>
												<input type="text" id="codigo_aba_intermediario" name="codigo_aba_intermediario"  class="form-control mayusculas" placeholder="Ej: 20 carácteres" value="{{ old('codigo_aba_intermediario') }}" maxlength="20">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group{{ $errors->has('moneda') ? ' has-error' : '' }}">
												<label class="control-label">Moneda (*)</label>
												<select  id="moneda" name="moneda" class="form-control select2me" data-placeholder="Select...">
													<option value="">ELEGIR MONEDA</option>
													@foreach($currencys as $currency)
														<option value="{{$currency->id}}">{{$currency->moneda}} ({{$currency->signo}})</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Tipo de Cuenta(*)</label>
												<input type="text" id="tipo_cuenta" name="tipo_cuenta"  class="form-control mayusculas" placeholder="Ej: CORRIENTE" value="{{ old('tipo_cuenta') }}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Forma de Pago(*)</label>
												<select  id="forma_pago" name="forma_pago" class="form-control select2me" data-placeholder="Select...">
													<option value="">ELEGIR FORMA DE PAGO</option>
													@foreach($condicion_pago as $condicion_de_pago)
														<option value="{{$condicion_de_pago->id}}">{{$condicion_de_pago->condicion}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<h3 class="form-section">Agregar Datos Adicionales</h3>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Página Web(*)</label>
												<input type="text" id="pagina_web" name="pagina_web"  class="form-control mayusculas" placeholder="Ej: www.miempresa.com" value="{{ old('pagina_web') }}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Información Página Web</label>
												<textarea id="info_web" name="info_web"  class="form-control mayusculas" placeholder="Ej: PÁGINA CORPORATIVA" value="{{ old('info_web') }}" ></textarea>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Usuario Pagina Web</label>
												<input type="text" id="usuario_pagina" name="usuario_pagina"  class="form-control mayusculas" placeholder="Ej: camila6" value="{{ old('usuario_pagina') }}">
											</div>
										</div>
										<div class="col-md-3" >
											<div class="form-group">
												<label class="control-label">Login</label>
												<input type="password" id="login" name="login" class="form-control mayusculas" placeholder="Ej: 12345(******)" value="{{ old('login') }}">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label">Comentarios</label>
												<textarea id="comentarios" name="comentarios" class="form-control mayusculas" placeholder="Ej: Encargo de envio retrasado..." value="{{ old('comentarios') }}" ></textarea>
											</div>
										</div>
									</div>
									<!--/row-->

							<!-- END FORM-->
							@endif
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						</div>
						<div class="form-actions right">
							<a href="../proveedores" title="Cancelar" class="btn btn-default">Cancelar</a>
							<button type="submit"  onclick="validar('form-proveedor')" title="Guardar" class="btn btn-info"><i class="fa fa-check"></i> Guardar</button>
						</div>
					</form>

						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
</div>
<div id="tipoPro" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Selecciones Tipo de Proveedor</h4>
      </div>
      <div class="modal-body">
				<div class="row">
					<select  id="tipo-pro" name="tipo-pro" class="form-control select2me" data-placeholder="Select...">
						<option value="">Elegir proveedor a crear</option>
						<option value="NACIONAL">Proveedor Nacional</option>
						<option value="INTERNACIONAL">Proveedor Internacional</option>
					</select>
      </div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- END CONTENT -->
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
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js')}}" type="text/javascript"></script>
	<script>

/*	function TipoProveedor(){
	   	var origen  = $("#tipo_proveedor").val();
	   	//console.log(origen);
	   	if(origen == "NACIONAL"){
	   		$("#displayrut").show();
	   		$("#moneda").select2('val', 1);
	   	}
	   	else{
	   		$("#displayrut").hide();
	   		$("#rut").val("0");
	   	}
	}
*/
	$(document).ready(function() {
	   App.init();
	   TableAdvanced.init();
		 	//$("#ocultarFormulario").hide();
			//$("#tipoPro").modal("show");
		 	//$("#proveedor-nacional").click(function() {


				//$("#tipoPro").modal("hide");
				/*alert("chuchetuareee");
				var valor = $(this).val();
				if(valor == 'NACIONAL'){

					$("#ocultarFormulario").show();
					$("#campo-internacional-1").hide();
					$("#campo-internacional-2").hide();
					$("#campo-internacional-3").hide();
					$("#campo-internacional-4").hide();
					$("#campo-internacional-5").hide();
					$("#campo-internacional-6").hide();
					$("#campo-internacional-7").hide();
					$("#campo-internacional-8").hide();
					$("#campo-internacional-9").hide();
					$("#displayrut").show();
					$("#moneda").select2('val', 1);
					$("#origen").select2('val', 46);
					$("#codigo_aba").removeAttr('required');
					$("#direccion_banco").removeAttr('required');
					$("#codigo_swif").removeAttr('required');
					$("#direccion_beneficiario_banco").removeAttr('required');
					$("#codigo_postal").removeAttr('required');
				}else{
					$("#tipoPro").modal("hide");
					$("#ocultarFormulario").show();
					$("#campo-internacional-1").show();
					$("#campo-internacional-2").show();
					$("#campo-internacional-3").show();
					$("#campo-internacional-4").show();
					$("#campo-internacional-5").show();
					$("#campo-internacional-6").show();
					$("#campo-internacional-7").show();
					$("#campo-internacional-8").show();
					$("#campo-internacional-9").show();
					$("#rut").removeAttr('required');
					$("#displayrut").hide();
					$("#region").removeAttr('required');

				}

			});*/

			$("#telefono").bind("keydown", function(event) {
				if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
					return;

					} else {
						if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
							event.preventDefault();
						}
					}
				});
				$("#celular").bind("keydown", function(event) {
					if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
						return;

						} else {
							if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
								event.preventDefault();
							}
						}
					});
					$("#nro_cuenta").bind("keydown", function(event) {
						if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
							return;

							} else {
								if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
									event.preventDefault();
								}
							}
						});
						$("#rut").bind("keydown", function(event) {
							if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
								return;

								} else {
									if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
										event.preventDefault();
									}
								}
							});
							$("#rut_beneficiario").bind("keydown", function(event) {
								if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
									return;

									} else {
										if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
											event.preventDefault();
										}
									}
								});
	   $("#rut").Rut({
  			on_error: function(){ alert('El rut ingresado es incorrecto'); },
		   format_on: 'keyup'
		});
		$("#rut_beneficiario").Rut({
			 on_error: function(){ alert('El rut ingresado es incorrecto'); },
			format_on: 'keyup'
	 });

	   	$("#moneda").select2('val', '{{  old('moneda') }}');
	   	$("#origen").select2('val', '{{  old('origen') }}');

		$("#proveedores").addClass( "active" );
		$("#proveedores-a").append( '<span class="selected"></span>' );

	});

	function validar(id_form){
        var reglas = {
            rut: {
                required: true
            },
            nombre: {
                required: true
            },
						razon_social: {
								required: true
						},
						direccion: {
								required: true
						},
						region: {
								required: true
						},
						ciudad: {
								required: true
						},
						comuna: {
								required: true
						},
						telefono: {
								required: true
						},
						celular: {
								required: true
						},
						email_empresa: {
								required: true
						},
						contacto: {
								required: true
						},
						correo: {
								required: true
						},
						nombre_beneficiario: {
								required: true
						},
						rut_beneficiario: {
								required: true
						},
						nro_cuenta: {
								required: true
						},
						banco: {
								required: true
						},
						tipo_cuenta: {
								required: true
						},
						forma_pago: {
								required: true
						},
						pagina_web: {
								required: true
						},
						origen: {
								required: true
						},
						codigo_postal: {
								required: true
						},
						direccion_beneficiario_banco: {
								required: true
						},
						direccion_banco: {
								required: true
						},
						codigo_swif: {
								required: true
						},
						moneda: {
								required: true
						},
						ciudad_in: {
								required: true
						}

        };

        ValidaForm(id_form, reglas);
    }
</script>
@endpush
