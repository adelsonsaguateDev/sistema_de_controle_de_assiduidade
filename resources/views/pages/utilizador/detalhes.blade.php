@extends('layouts.main')

@section('title', 'Lista de Utilizadores')

@section('content')

    @include('components.Sidebar')
    @include('components.Navbar')



    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <div class="breadcrumb">
                <h1 class="font-weight-bold">Lista Utilizadores</h1>
            </div>
            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">


                            <div class="ul-widget__item">
                                <div class="ul-widget__info">
                                    <span class="ul-widget__desc text-mute">Nome</span>
                                    <h3 class="ul-widget1__title" style="font-size: 15px">
                                        {{ (string) $utilizador->nome . ' ' . $utilizador->apelido }}</h3>
                                </div>
                                <div class="ul-widget__info">
                                    <span class="ul-widget__desc text-mute">Função</span>
                                    <h3 class="ul-widget1__title" style="font-size: 15px">
                                        {{ (string) $utilizador->TipoUtilizador->nome }}</h3>
                                </div>
                                <div class="ul-widget__info">
                                    <span class="ul-widget__desc text-mute">Data de Registro</span>
                                    <h3 class="ul-widget1__title" style="font-size: 15px">{{ $utilizador->created_at }}
                                    </h3>
                                </div>

                                <div class="ul-widget__info">
                                    <span class="ul-widget__desc text-mute">Estado</span>

                                    @if ($utilizador->estado == 1)
                                        <h3 class="ul-widget1__title" style="font-size: 15px"><span
                                                class="badge badge-success mr-1 mb-1"> Activo </span></h3>
                                    @endif

                                    @if ($utilizador->estado == 2)
                                        <h3 class="ul-widget1__title" style="font-size: 15px"><span
                                                class="badge badge-danger mr-1 mb-1"> Inactivo </span></h3>
                                    @endif

                                </div>

                                <div class="ul-widget__info">
                                    <span class="ul-widget__desc text-mute"></span>
                                    <h3 class="ul-widget1__title" style="font-size: 15px"></h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        <div class="card user-profile o-hidden mb-4">

                            <div class="card-body">
                                <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="historico-tab" data-toggle="tab"
                                            href="#historico"role="tab" aria-controls="about" aria-selected="true">
                                            <i class="fa fa-clock mr-1"></i>
                                            Histórico
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="profileTabContent">


                                    <div class="tab-pane fade active show" id="historico" role="tabpanel"
                                        aria-labelledby="about-tab">
                                        @if (isset($historico) && $historico->count() > 0)
                                            @foreach ($historico as $item)
                                                <div class="mb-1"><strong class="mr-1"> <i
                                                            class="fa fa-user-circle mr-1"></i>
                                                        {{ $item->users->nome ?? '[User]' }}
                                                        {{ $item->descricao ?? 'Sem descrição' }} </strong>
                                                    <p class="text-muted"> <i class="fa fa-calendar mr-1"></i>
                                                        {{ $item->created_at ?? '' }}</p>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="alert alert-info d-flex align-items-center mb-0" role="alert">
                                                <i class="ti ti-info-circle fs-4 me-2"></i>
                                                <div>
                                                    <strong class="text-capitalize">Alerta!</strong>
                                                    Nenhum historico encontrado.
                                                </div>
                                            </div>

                                        @endif

                                    </div>
                                    <div class="card-footer bg-white py-3">
                                        <div class="pagination justify-content-end">
                                            {{ $historico->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end of main-content -->
                    </div><!-- Footer Start -->
                </div>

            </div>

            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- [ Main Content ] end -->
    @include('components.Footer')

@endsection

@section('scripts')
@section('scripts')
    <script>
        $(document).ready(function() {
            $(".utilizadores").addClass("active")
            hideLoader();

        });
    </script>
@endsection
@endsection
