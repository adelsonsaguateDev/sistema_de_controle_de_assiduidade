@extends('layouts.main')

@section('title', 'Lista de Salas | Portal de Gestão de Salas de Exame de Admissão')


@section('content')

    <div class="app-admin-wrap layout-sidebar-large">
        @include('components.Navbar')
        @include('components.Sidebar')

        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="font-weight-bold">Registro de Salas</h1>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-transparent">
                                <h3 class="card-title ">Formulário de Carregamento de Ficheiros</h3>
                            </div>
                            <!-- begin::form-->
                            <form action="#" method="post" name="frmAddUser" id="frmAddUser"
                                enctype="multipart/form-data">
                                <input type="hidden" name="import">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="ul-form__label font-weight-bold" for="banco">Faculdade: </label>
                                            <div class="input-right-icon">
                                                <select class="form-control form-control-lg" name="banco" id="banco"
                                                    required>
                                                    <option value="">Selecione Aqui...</option>
                                                    <option value="">Faculdade de Engenharias e Tecnologias (FET)</option>
                                                    <option value="">Faculdade de Ciências Naturais e Matemática (FCNM)</option>
                                                </select>
                                                <span class="span-right-input-icon"><i
                                                        class="ul-form__icon i-Bank"></i></span>
                                            </div>
                                            <small class="ul-form__text form-text" id="bankHelpBlock">
                                                Por favor, Escolha a Faculdade
                                            </small>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="ul-form__label font-weight-bold" for="file">Ficheiro:</label>
                                            <input class="form-control form-control-lg" name="file" id="file"
                                                accept=".xls,.xlsx" type="file" required />

                                            <small class="ul-form__text form-text" id="fileHelpBlock">
                                                Por favor, Escolha o Ficheiro
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <div class="mc-footer">
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <button
                                                    class="btn btn-lg btn-primary ladda-button basic-ladda-button sub-button"
                                                    data-style="expand-left" type="submit">Submeter</button>
                                                <a href="#" class="btn btn-lg btn-outline-secondary m-1"
                                                    type="button">Cancelar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--  end::form 3-->
                            <div class="custom-separator"></div>

                            <div class="text-center">
                                <div class="spinner-bubble spinner-bubble-primary m-5" id="loader1" hidden></div>
                            </div>
                            <div class="text-center">
                                    <span style="font-size: 1.2rem" class="badge badge-info mb-5">RESULTADOS DA INSERÇÃO</span>
                            </div>

                            <div class="card-body" id="resultsBody">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">

                                        <div class="table-responsive">
                                            <table id="successResult" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <th>Total de Salas</th>
                                                        <td><span class="ul-widget5__number" id="total">0</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <th>Total de Salas Inseridas:</th>
                                                        <td><span class="ul-widget5__number" id="totalInserted">0</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <th>Total de Salas já Existentes:</th>
                                                        <td><span class="ul-widget5__number" id="totalExist">0</span></td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <th>Total de Salas com Erros:</th>
                                                        <td><span class="ul-widget5__number" id="totalError">0</span></td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">5</th>
                                                        <th>Total de Salas Actualizadas:</th>
                                                        <td><span class="ul-widget5__number" id="totalUpdated">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table id="failedResult" class="table table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <div class="alert alert-card alert-danger" role="alert">
                                                                <strong class="text-capitalize">Erro ao Carregar!</strong>
                                                                O
                                                                ficheiro selecionado não contêm a estrutura padronizada da
                                                                faculdade, porfavor, reveja o Ficheiro.
                                                                <button class="close" type="button" data-dismiss="alert"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer Start -->
            @include('components.Footer')
            <!-- fotter end -->
        </div>
    </div>

@endsection


@section('scripts')

    <script>
        $(document).ready(function() {

            hideLoader();
            $(".sala_exame").addClass("active")
            $(".select2").select2({
                allowClear: true
            });

        });
    </script>
@endsection
