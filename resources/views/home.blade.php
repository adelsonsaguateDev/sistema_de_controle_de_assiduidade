@extends('layouts.main')

@section('title', 'Página Inicial')

@section('content')

    @include('components.Sidebar')
    @include('components.Navbar')


    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <div class="row">

                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-success">
                                        <i class="ti ti-users fs-1"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Total Colaboradores</h6>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                                            href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="ti ti-dots-vertical f-18"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Weekly</a>
                                            <a class="dropdown-item" href="#">Monthly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-body p-3 mt-3 rounded">
                                <div class="mt-3 row align-items-center">
                                    <div class="col-7">
                                        <div id="total-task-graph"></div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-1">100</h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-warning">
                                        <i class="ti ti-user fs-1"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Total Utilizadores</h6>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                                            href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="ti ti-dots-vertical f-18"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Weekly</a>
                                            <a class="dropdown-item" href="#">Monthly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-body p-3 mt-3 rounded">
                                <div class="mt-3 row align-items-center">
                                    <div class="col-7">
                                        <div id="total-task-graph"></div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-1">50</h5>
                                        <p class="text-success mb-0">
                                            <i class="ti ti-arrow-up-right"></i> New
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-info">
                                        <i class="ti ti-subtask fs-1"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Total Actividades</h6>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                                            href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="ti ti-dots-vertical f-18"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Weekly</a>
                                            <a class="dropdown-item" href="#">Monthly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-body p-3 mt-3 rounded">
                                <div class="mt-3 row align-items-center">
                                    <div class="col-7">
                                        <div id="total-task-graph"></div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-1">73</h5>
                                        <p class="text-success mb-0">
                                            <i class="ti ti-arrow-up-right"></i> New
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-primary">
                                        <i class="ti ti-user-check fs-1"></i>
                                       
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Total Entradas</h6>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                                            href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="ti ti-dots-vertical f-18"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Weekly</a>
                                            <a class="dropdown-item" href="#">Monthly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-body p-3 mt-3 rounded">
                                <div class="mt-3 row align-items-center">
                                    <div class="col-7">
                                        <div id="all-earnings-graph"></div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-1">270</h5>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-warning">
                                        <i class="ti ti-user-x fs-1"></i>

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">Total Saidas</h6>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                                            href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="ti ti-dots-vertical f-18"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Weekly</a>
                                            <a class="dropdown-item" href="#">Monthly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-body p-3 mt-3 rounded">
                                <div class="mt-3 row align-items-center">
                                    <div class="col-7">
                                        <div id="page-views-graph"></div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-1">290</h5>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="flex-grow-1">
                                    <h5 class="mb-0">Entradas/Mês</h5>
                                </div>
                                <div class="flex-shrink-0 ms-3">
                                    <div class="dropdown">
                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                                            href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="ti ti-dots f-18"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Today</a>
                                            <a class="dropdown-item" href="#">Weekly</a>
                                            <a class="dropdown-item" href="#">Monthly</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-end my-2">
                                5.44% <span class="badge bg-success">+2.6%</span>
                            </h5>
                            <div id="customer-rate-graph"></div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body border-bottom pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Controle de Assiduidade</h5>
                                <div class="dropdown">
                                    <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="ti ti-dots-vertical f-18"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs analytics-tab" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="analytics-tab-1" data-bs-toggle="tab"
                                        data-bs-target="#analytics-tab-1-pane" type="button" role="tab"
                                        aria-controls="analytics-tab-1-pane" aria-selected="true">
                                        Todos Colaboradores
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="analytics-tab-2" data-bs-toggle="tab"
                                        data-bs-target="#analytics-tab-2-pane" type="button" role="tab"
                                        aria-controls="analytics-tab-2-pane" aria-selected="false">
                                        Presentes
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="analytics-tab-3" data-bs-toggle="tab"
                                        data-bs-target="#analytics-tab-3-pane" type="button" role="tab"
                                        aria-controls="analytics-tab-3-pane" aria-selected="false">
                                        Ausentes
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel"
                                aria-labelledby="analytics-tab-1" tabindex="0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-primary"
                                                    data-bs-toggle="tooltip" data-bs-title="143 Posts">
                                                    <span>MD</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Melin Dombo</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>06:30 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">-26</h6>
                                                        <p class="text-warning mb-0">
                                                            <i class="ti ti-arrows-left-right"></i> 5%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border" data-bs-toggle="tooltip"
                                                    data-bs-title="143 Posts">
                                                    <span>UM</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Urias Matos</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>08:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-warning"
                                                    data-bs-toggle="tooltip" data-bs-title="143 Posts">
                                                    <span>OC</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Olga Cassio</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>07:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-success"
                                                    data-bs-toggle="tooltip" data-bs-title="143 Posts">
                                                    <span>AJ</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Arisson Júlio</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>07:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-danger" data-bs-toggle="tooltip"
                                                    data-bs-title="143 Posts">
                                                    <span>AM</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Ananias Manjate</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>07:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="analytics-tab-2-pane" role="tabpanel"
                                aria-labelledby="analytics-tab-2" tabindex="0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-primary"
                                                    data-bs-toggle="tooltip" data-bs-title="143 Posts">
                                                    <span>MD</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Melin Dombo</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>06:30 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">-26</h6>
                                                        <p class="text-warning mb-0">
                                                            <i class="ti ti-arrows-left-right"></i> 5%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border" data-bs-toggle="tooltip"
                                                    data-bs-title="143 Posts">
                                                    <span>UM</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Urias Matos</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>08:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-warning"
                                                    data-bs-toggle="tooltip" data-bs-title="143 Posts">
                                                    <span>OC</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Olga Cassio</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>07:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-success"
                                                    data-bs-toggle="tooltip" data-bs-title="143 Posts">
                                                    <span>AJ</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Arisson Júlio</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>07:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-danger" data-bs-toggle="tooltip"
                                                    data-bs-title="143 Posts">
                                                    <span>AM</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Ananias Manjate</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>07:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="analytics-tab-3-pane" role="tabpanel"
                                aria-labelledby="analytics-tab-3" tabindex="0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-primary"
                                                    data-bs-toggle="tooltip" data-bs-title="143 Posts">
                                                    <span>MD</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Melin Dombo</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>06:30 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">-26</h6>
                                                        <p class="text-warning mb-0">
                                                            <i class="ti ti-arrows-left-right"></i> 5%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border" data-bs-toggle="tooltip"
                                                    data-bs-title="143 Posts">
                                                    <span>UM</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Urias Matos</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>08:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-warning"
                                                    data-bs-toggle="tooltip" data-bs-title="143 Posts">
                                                    <span>OC</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Olga Cassio</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>07:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-success"
                                                    data-bs-toggle="tooltip" data-bs-title="143 Posts">
                                                    <span>AJ</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Arisson Júlio</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>07:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s border bg-light-danger" data-bs-toggle="tooltip"
                                                    data-bs-title="143 Posts">
                                                    <span>AM</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="row g-1">
                                                    <div class="col-6">
                                                        <h6 class="mb-0">Ananias Manjate</h6>
                                                        <p class="text-muted mb-0">
                                                            <small>07:40 pm</small>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="col-6 text-end">
                                                        <h6 class="mb-1">+210,000</h6>
                                                        <p class="text-success mb-0">
                                                            <i class="ti ti-arrow-up-right"></i> 10.6%
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="d-grid">
                                        <button class="btn btn-outline-secondary d-grid">
                                            <span class="text-truncate w-100">Ver Todos</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Controle Geral</h5>
                                <div class="dropdown">
                                    <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="ti ti-dots-vertical f-18"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                    </div>
                                </div>
                            </div>
                            <div id="total-income-graph"></div>
                            <div class="row g-3 mt-3">
                                <div class="col-sm-6">
                                    <div class="bg-body p-3 rounded">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-shrink-0">
                                                <span class="p-1 d-block bg-primary rounded-circle"><span
                                                        class="visually-hidden">New alerts</span></span>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <p class="mb-0">Income</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-0">
                                            $23,876
                                            <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="bg-body p-3 rounded">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-shrink-0">
                                                <span class="p-1 d-block bg-warning rounded-circle"><span
                                                        class="visually-hidden">New alerts</span></span>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <p class="mb-0">Rent</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-0">
                                            $23,876
                                            <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="bg-body p-3 rounded">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-shrink-0">
                                                <span class="p-1 d-block bg-success rounded-circle"><span
                                                        class="visually-hidden">New alerts</span></span>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <p class="mb-0">Download</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-0">
                                            $23,876
                                            <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="bg-body p-3 rounded">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="flex-shrink-0">
                                                <span class="p-1 d-block bg-light-primary rounded-circle"><span
                                                        class="visually-hidden">New alerts</span></span>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <p class="mb-0">Views</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-0">
                                            $23,876
                                            <small class="text-muted"><i class="ti ti-chevrons-up"></i> +$763,43</small>
                                        </h6>
                                    </div>
                                </div>
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

    {{-- Graph --}}
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/all-earnings-graph.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/page-views-graph.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/total-task-graph.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/download-graph.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/customer-rate-graph.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/tasks-graph.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/total-income-graph.js') }}"></script>

    <script>
        $(document).ready(function() {

            hideLoader();
            $(".dashboard_barra").addClass("active");

        });
    </script>
@endsection
