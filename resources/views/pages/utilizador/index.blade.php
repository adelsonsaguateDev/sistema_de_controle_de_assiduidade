@extends('layouts.main')

@section('title', 'Lista de Utilizadores')

@section('content')

    @include('components.Sidebar')
    @include('components.Navbar')
    @include('pages.utilizador.modal.AddUtilizador')
    @include('pages.utilizador.modal.form_edit')


    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <div class="breadcrumb">
                <h1 class="font-weight-bold">Lista Utilizadores</h1>
            </div>
            <div class="separator-breadcrumb border-top"></div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <i style="color:crimson; font-size:large"
                                        title="Estes campos permitem realizar filtros, pelos diversos paramêtros."
                                        class="ti ti-info-circle">
                                    </i>
                                </div>
                                <div class="col-md-12 text-right" style="text-align: right">
                                    <div class="btn-group">
                                        <button class="btn btn-linkedin btn-lg dropdown-toggle" id="print" type="button"
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
                                    <button data-bs-toggle="modal" data-bs-target="#rg_utilizador"
                                        class="btn btn-outline-success btn-lg ml-2">
                                        <i class="ph-duotone ph-plus-circle"></i> Novo Utilizador
                                    </button>
                                   
                                </div>
                            </div>
                            <div class="tab-border"></div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="nome_filtro"
                                        style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Nome</label>
                                    <input type="text" class="form-control" name="nome_filtro" id="nome_filtro" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for=""
                                        style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Estado</label>
                                    <select class="form-control select2" name="estado_filtro" id="estado_filtro">
                                        <option selected value="1"> Activo</option>
                                        <option value="2"> Inactivo</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for=""
                                        style="font-family: 'Arial narrow'; font-size: 14px; color: #2C304D; font-weight: 600;">Limite</label>
                                    <select name="limit" id="limit" class="form-control select2">

                                        <option selected value="10">10</option>
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
                                <div class="list_utilizadores"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- [ Main Content ] end -->
    @include('components.Footer')

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".utilizadores_list").addClass("active")
            
            var limite = $('#limit').val()
            var page = 1

            list(page, limite);

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                page = $(this).attr('href').split('page=')[1];
                $(this).attr('href', '');
                list(page, limite);

            });


            $(".pesquisar").click(function() {
                let limite = $('#limit').val();
                list(page, limite);

            })

            $(document).on("click", "#btn_edit", function() {

                let id = $(this).val()

                var url = '{{ url('utilizadores/show') }}/' + id;


                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: 'html',
                    success: function(response) {
                        console.log(response)

                        $('.conteudo_utilizador').html(response);
                        $('#editUtilizadorModal').modal('show');



                    },
                    error: function(err) {
                        // console.log(err);
                    }
                }).always(function() {
                    hideLoader();
                });


            });


            $(document).on("click", "#btn_delete", function() {
                var utilizador_id = $(this).val();
                var estado = 2


                Swal.fire({
                    title: 'ALERTA!',
                    text: "Tem certeza que deseja apagar?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0CC27E',
                    cancelButtonColor: '#FF586B',
                    confirmButtonText: 'Sim, Tenho!',
                    cancelButtonText: 'Não, cancelar!',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success mr-5',
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        update_estado(utilizador_id, estado);
                    } 
                });


            });


            $(document).on("click", "#btn_show", function() {
                showLoader();

                var utilizador_id = $(this).val();
                var url = '{{ url('utilizador') }}/' + utilizador_id;

                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)


                    },
                    error: function(err) {
                        console.log(err);
                    }
                }).always(function() {
                    hideLoader();
                });

            });




            function update_estado(utilizador_id, estado) {
                showLoader();
                $.ajax({
                    url: '{{ url('utilizadores/delete') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        utilizador_id: utilizador_id,
                        estado: estado,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            Swal.fire({
                                icon: "success",
                                title: `${response.message}`,
                                showConfirmButton: false,
                                timer: 2000,
                            });

                            list(page, limite);


                        } else {
                            Swal.fire({
                                icon: "error",
                                title: `${response.message}`,
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        }


                    },
                    error: function(err) {
                        console.log(err);
                        Swal.fire({
                            icon: "error",
                            title: `${err}`,
                            showConfirmButton: false,
                            timer: 2000,
                        });

                    }
                }).always(function() {
                    hideLoader();
                });
            }



            $(document).on("click", "#btn_active", function() {
                var utilizador_id = $(this).val();
                var estado = '1';


                Swal.fire({
                    title: 'ALERTA!',
                    text: "Tem certeza que deseja activar?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0CC27E',
                    cancelButtonColor: '#FF586B',
                    confirmButtonText: 'Sim, Tenho!',
                    cancelButtonText: 'Não, cancelar!',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success mr-5',
                        cancelButton: 'btn btn-danger'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Ação quando o botão de confirmação é clicado
                        update_estado(utilizador_id, estado);
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Ação quando o botão de cancelamento é clicado
                        Swal.fire('', 'Operação foi cancelada!', 'error');
                    }
                });


            });




            function list(page, limite) {
                showLoader();
                var estado = $("#estado_filtro").val();
                var nome = $("#nome_filtro").val()

                $.ajax({
                    url: '{{ url('utilizadores/list') }}?page=' + page,
                    method: 'GET',
                    data: {
                        "estado": estado,
                        "nome": nome,
                        "limite": limite,
                    },
                    dataType: 'html',
                    success: function(data) {
                        $(".list_utilizadores").html(data);
                        hideLoader();
                    },
                    error: function(err) {
                        console.log(err);
                    }
                }).always(function() {
                    hideLoader();
                });
            }
        });
    </script>
@endsection
