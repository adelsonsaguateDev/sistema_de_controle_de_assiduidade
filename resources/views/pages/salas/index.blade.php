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
                    <h1 class="font-weight-bold">Lista de Salas</h1>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-left ">
                                        <i style="color:crimson; font-size:large"
                                            title="Estes campos permitem realizar filtros, pelos diversos paramêtros."
                                            class="ti ti-info-alt">
                                        </i>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <div class="btn-group">
                                            <button class="btn btn-linkedin btn-lg dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ti ti-bookmark"></i> Exportar
                                            </button>
                                            <div class="dropdown-menu">
                                                <button class="btn btn-secundary dropdown-item" id="print"> <i
                                                        class="fa fa-file-pdf-o"></i> PDF</button>
                                                <a class="dropdown-item" href="#"> <i class="fa fa-file-excel-o"></i>
                                                    EXCEL</a>
                                            </div>
                                        </div>
                                        <a class="btn btn-success btn-lg ml-2" href="{{ route('salas.form_create') }}">
                                            <i class="ti ti-plus"></i> Nova Sala
                                        </a>
                                    </div>
                                </div>
                                <div class="tab-border"></div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for=""
                                            style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Nome
                                            da Sala</label>
                                        <input type="text" class="form-control" name="nome" id="nome" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for=""
                                            style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Faculdade</label>
                                        <select name="id_provincia" id="id_provincia" class="form-control select2" required>
                                            <option value=""> Selecione a faculdade </option>

                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for=""
                                            style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Posição</label>
                                        <select name="id_distrito" id="id_distrito" class="form-control select2" required>
                                            <option value=""> Selecione a posição </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for=""
                                            style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Estado</label>
                                        <select name="estado" id="estado" class="form-control select2" required>
                                            <option value=""> Selecione o estado </option>
                                            <option value="1"> Activo</option>
                                            <option value="2"> Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for=""
                                            style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Limite</label>
                                        <select name="limit" id="limit" class="form-control select2">

                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="1000">1000</option>
                                            <option value="2000">2000</option>
                                            <option value="">Todos</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3 text-right" style="text-align: right">
                                        <button class="btn btn-secondary btn-xs search pesquisar">Pesquisar</button>
                                    </div>
                                </div>
                                <br><br>
                                <div class="table-responsive">
                                    <div class="list_salas_exame"></div>
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
