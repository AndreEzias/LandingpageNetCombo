<form id="form" data-step="1" class="" data-lead="" method="post" action="/obrigado">
    <input type="hidden" name="step" value="1">
    <input type="hidden" name="id" value="{!! isset($response['id']) ?$response['id'] : '' !!}">
    <div class="row">
        <div class="form-group col-md-12">
            <input type="text" id="name_field" name="name" class="form-control form-control-lg shadow" placeholder="Nome*" required="required" >
        </div>
        <div class="form-group col-md-6">
            <input type="text" id="telefone_field" name="telefone" class="form-control form-control-lg shadow" placeholder="Telefone*" data-mask="(00) 0000-00009" required="required">
        </div>
        <div class="form-group col-md-6">
            <input type="text" id="celular_field" name="telefone_2" class="form-control form-control-lg shadow" placeholder="Telefone Alternativo" data-mask="(00) 00000-0009">
        </div>
        <div class="form-group col-md-12">
            <input type="text" id="address_field" name="address" class="form-control form-control-lg shadow" placeholder="Endereço" required="required" {!! isset($response['address']->address)?'readonly':'' !!} value="{!! isset($response['address']->address)?$response['address']->address:'' !!}">
        </div>
        <div class="form-group col-md-4">
            <input type="text" id="number_field" name="number" class="form-control form-control-lg shadow" placeholder="Número*" data-mask="0#" required="required">
        </div>
        <div class="form-group col-md-8">
            <input type="text" id="complement_field" name="complement" class="form-control form-control-lg shadow" placeholder="Complemento">
        </div>
        <div class="form-group col-md-8">
            <input type="text" id="city_field" name="city" class="form-control form-control-lg shadow" placeholder="Cidade" required="required" {!! isset($response['address']->city)?'readonly':'' !!} value="{!! isset($response['address']->city)?$response['address']->city:'' !!}">
        </div>
        <div class="form-group col-md-4">
            <input type="text" id="state_field" name="state" class="form-control form-control-lg shadow" placeholder="Estado" required="required" {!! isset($response['address']->state)?'readonly':'' !!} value="{!! isset($response['address']->state)?$response['address']->state:'' !!}" data-mask="SS">
        </div>
        <div class="form-group col-md-12">
            <input type="submit" class="btn btn-lg btn-success w-100" value="Enviar">
        </div>
    </div>
</form>