<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('pagina_inicial') }}"
                class="b-brand text-primary"><!-- ========   Change your logo from here   ============ -->
                <img src="../assets/images/logo-dark.svg" class="img-fluid logo-lg" alt="logo" />
                <span class="badge bg-light-success rounded-pill ms-2 theme-version">v1.0</span></a>
        </div>
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="../assets/images/user/avatar-1.jpg" alt="user-image"
                                class="user-avtar wid-45 rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            <h6 class="mb-0">{{ session('nome_utilizador') }}</h6>
                            <small>{{ session('tipo_utilizador') }}</small>
                        </div>
                        <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse"
                            href="#pc_sidebar_userlink"><svg class="pc-icon">
                                <use xlink:href="#custom-sort-outline"></use>
                            </svg></a>
                    </div>
                    <div class="collapse pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3">
                            <a href="#!"><i class="ti ti-user"></i>
                                <span data-i18n="Minha conta">Minha conta</span>
                            </a>
                            <a href="#!"><i class="ti ti-settings"></i>
                                <span data-i18n="Definições">Definições</span>
                            </a>
                            <a href="{{ route('login') }}"><i class="ti ti-power"></i>
                                <span data-i18n="Terminar a sessão">Terminar a sessão</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="pc-navbar">
                <li class="pc-item pc-hasmenu dashboard_barra">
                    <a href="{{ route('pagina_inicial')}}" class="pc-link"><span class="pc-micon"><svg class="pc-icon">
                                <use xlink:href="#custom-status-up"></use>
                            </svg> </span><span class="pc-mtext" data-i18n="Dashboard">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu colaboradores_list">
                    <a href="#!" class="pc-link"><span class="pc-micon"><svg class="pc-icon">
                                <use xlink:href="#custom-user"></use>
                            </svg> </span><span class="pc-mtext" data-i18n="Colaboradores">Colaboradores</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu utilizadores_list">
                    <a href="{{ route('utilizadores.index') }}" class="pc-link"><span class="pc-micon"><svg class="pc-icon">
                                <use xlink:href="#custom-user-square"></use>
                            </svg> </span><span class="pc-mtext" data-i18n="Utilizadores">Utilizadores</span>
                    </a>
                </li>

                <li class="pc-item pc-hasmenu relatorios_list">
                    <a href="../widget/w_chart.html" class="pc-link"><span class="pc-micon"><svg class="pc-icon">
                                <use xlink:href="#custom-presentation-chart"></use>
                            </svg> </span><span class="pc-mtext" data-i18n="Relatórios">Relatórios</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu folgas_list">
                    <a href="../application/file-manager.html" class="pc-link"><span class="pc-micon"><svg
                                class="pc-icon">
                                <use xlink:href="#custom-document-filter"></use>
                            </svg> </span><span class="pc-mtext" data-i18n="Folgas">Folgas</span></a>
                </li>
                <li class="pc-item pc-hasmenu parametrizacoes_list">
                    <a href="../application/file-manager.html" class="pc-link"><span class="pc-micon"><svg
                                class="pc-icon">
                                <use xlink:href="#custom-setting-outline"></use>
                            </svg> </span><span class="pc-mtext" data-i18n="Parametrizações">Parametrizações</span></a>
                </li>


            </ul>
        </div>
    </div>
</nav>
