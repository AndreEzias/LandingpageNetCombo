<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark w-100 text-center" id="exampleModalLabel">Consulte se a NET já chegou em sua Região</h5>
            </div>
            <div class="modal-body">
                <form id="form_0" action="#" data-step="0">
                    <input type="hidden" name="step" value="0">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" id="email_field" name="email" class="form-control form-control-lg shadow" placeholder="E-mail*" >
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" id="cep_field" name="cep" class="form-control form-control-lg shadow" placeholder="CEP*" data-mask="00000-000">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" id="cpf_field" name="cpf" class="form-control form-control-lg shadow" placeholder="CPF*" data-mask="000.000.000-00">
                        </div>
                    </div>
                </form>
                <form id="form_1" data-step="1" class="d-none" data-lead="">
                    <input type="hidden" name="step" value="1">
                    <input type="hidden" name="id" value="">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="text" id="name_field" name="name" class="form-control form-control-lg shadow" placeholder="Nome">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" id="telefone_field" name="telefone" class="form-control form-control-lg shadow" placeholder="Telefone" data-mask="(00) 0000-00009">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" id="celular_field" name="telefone_2" class="form-control form-control-lg shadow" placeholder="Telefone Alternativo" data-mask="(00) 0000-00009">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" id="address_field" name="address" class="form-control form-control-lg shadow" placeholder="Endereço">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" id="number_field" name="number" class="form-control form-control-lg shadow" placeholder="Número*" data-mask="0#">
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" id="complement_field" name="complement" class="form-control form-control-lg shadow" placeholder="Complemento">
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" id="city_field" name="city" class="form-control form-control-lg shadow" placeholder="Cidade">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" id="state_field" name="state" class="form-control form-control-lg shadow" placeholder="Estado" data-mask="SS">
                        </div>
                    </div>
                </form>
                <div id="response" class="d-none">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="title">
                               Infelizmente a NET ainda não chegou na sua Região.
                            </h3>
                            <p class="text">
                                Enviaremos um Email para você assim que a Cobertura chegar até a sua Região.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Cancelar</button>--}}
                <button type="button" class="btn btn-lg btn-success w-100" id="form-send"><b>CONSULTAR COBERTURA NET</b></button>
            </div>
        </div>
    </div>
</div>