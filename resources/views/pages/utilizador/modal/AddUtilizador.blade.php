<!-- Modal -->
<div class="modal fade" id="rg_utilizador" tabindex="-1" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <h5 class="modal-title" id="exampleModalCenterTitle">Registo do Utilizador</h5>
                <div class="d-flex align-items-center justify-content-end">
                    <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"
                        data-bs-toggle="tooltip" title="Close"><i class="ti ti-x f-20"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST" id="form_registrar_utilizador"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <a style="color: red;text-align:center;">Nota: O ASTERISCO(<span
                                        class="text-danger">*</span>) indica a obrigatoriedade do campo.</a>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nome">Nome<span class="required">*</label>
                                    <input type="text" name="nome" class="form-control" id="nome"
                                        value="" aria-describedby="nome" placeholder="Digite o seu nome">
                                </div>
                                <div class="col-md-6">
                                    <label for="apelido">Apelido<span class="required">*</label>
                                    <input type="text" name="apelido" class="form-control" id="apelido"
                                        value="" aria-describedby="apelido" placeholder="Digite o seu apelido">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="username">Nome de utilizador<span class="required">*</label>
                                    <input type="text" name="username" value="" class="form-control"
                                        id="username" aria-describedby="username"
                                        placeholder="Digite o seu nome de utilizador">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">E-mail<span class="required">*</label>
                                    <input type="email" name="email" class="form-control" value=""
                                        id="email" aria-describedby="email" placeholder="Digite o seu email">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contacto">Contacto<span class="required">*</label>
                                    <input type="text" maxlength="9" name="contacto" class="form-control numero"
                                        id="contacto" value="" aria-describedby="contacto"
                                        placeholder="XXXXXXXXXXXX">
                                </div>
                                <div class="col-md-6">
                                    <label for="tipo_user">Tipo de Utilizaddor<span class="required">*</span></label>
                                    <select class="form-control fom-select select2" name="tipo_user" id="tipo_user">
                                        <option value="">Selecione...</option>
                                        @foreach ($tipo_utilizador as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password">Password<span class="required">*</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Digite a sua senha (minimo 6 digitos)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirm">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirm"
                                            class="form-control has-success" id="password_confirm"
                                            placeholder="Confirme a senha">
                                    </div>
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div> {{-- end modal body --}}
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Fechar</button>
                <button class="btn btn-success ml-2" id="registrar_utilizador" type="button">Submeter</button>
            </div>
        </div>
    </div>
</div>
