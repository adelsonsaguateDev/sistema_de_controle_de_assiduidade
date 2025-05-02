<?php session_start(); ?>
<?php $_SESSION['html'] = null; ?>
<?php $_SESSION['title'] = null; ?>
<?php $_SESSION['nome_utilizador'] = null; ?>
<?php $content = null; ?>


@if (count($utilizadores) > 0)
    <div class="card shadow border-0 mb-4">
        <div class="card-header  py-3">
            <div>
                <div class="badge bg-white text-primary rounded-3 px-4 py-2 fs-5 fw-bold" style="font-size: 1.2rem">
                    Total: {{ $total }}
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            @php
                ob_start();
            @endphp
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th class="border-0 py-3 ps-4" style="width: 3%;">#</th>
                            <th class="border-0 text-center py-3 col-1">Nome</th>
                            <th class="border-0 text-center py-3 col-1">Função</th>
                            <th class="border-0 text-center py-3 col-1">E-mail</th>
                            <th class="border-0 text-center py-3 col-1">Contacto</th>
                            <th class="border-0 text-center py-3 col-1">Estado</th>
                            <th class="border-0 text-center py-3 col-2" title="Data de Criação">
                                <i class="ti ti-calendar"></i>
                            </th>
                            @php
                                $content .= ob_get_contents();
                            @endphp
                            <th class="border-0 text-center py-3 col-2">Acções</th>
                            @php
                                ob_start();
                            @endphp
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cont = 1;
                        @endphp
                        @foreach ($utilizadores as $item)
                            <tr class="{{ $item->estado == 2 ? 'table-light' : '' }}">
                                <td class="ps-4"><strong>{{ $cont++ }}</strong></td>
                                <td class="text-center fw-medium">{{ $item->nome }}</td>
                                <td class="text-center fw-medium">{{ $item->TipoUtilizador->nome }}</td>
                                <td class="text-center fw-medium">{{ $item->email ?? 'Sem email' }}</td>
                                <td class="text-center fw-medium">{{ $item->contacto ?? 'Sem contacto' }}</td>
                                <td class="text-center fw-medium">
                                    @php
                                    if($item->estado == 1) :
                                    @endphp
                                    <div class="badge bg-success text-white">Activo</div>
                                    @php
                                    elseif($item->estado == 2):
                                   @endphp
                                    <div class="badge bg-danger text-white">Inactivo</div>
                                   @php
                                   endif
                                   @endphp
                                </td>

                                <td class="text-center">
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium">{{ date('d/m/Y', strtotime($item->created_at)) }}</span>
                                        <small
                                            class="text-muted">{{ date('H:i', strtotime($item->created_at)) }}</small>
                                    </div>
                                </td>
                                @php
                                    $content .= ob_get_contents();
                                @endphp
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('utilizadores.detalhes',['id' => $item->id]) }}" class="btn btn-primary btn-sm rounded-circle"
                                            title="Visualizar">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                        @if ($item->estado == 1)
                                            <button class="btn btn-warning btn-sm rounded-circle"
                                                name="{{ $item->nome }}" value="{{ $item->id }}" id="btn_edit"
                                                title="Editar">
                                                <i class="ti ti-pencil text-white"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm rounded-circle"
                                                value="{{ $item->id }}" id="btn_delete" title="Remover">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        @endif

                                        @if ($item->estado == 2)
                                            <button class="btn btn-success btn-sm rounded-circle"
                                                value="{{ $item->id }}" id="btn_active" title="Activar">
                                                <i class="ti ti-check"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                @php
                                    ob_start();
                                @endphp
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @php
                $content .= ob_get_contents();
            @endphp
        </div>

        <div class="card-footer bg-white py-3">
            <div class="pagination justify-content-end">
                {{ $utilizadores->links() }}
            </div>
        </div>
    </div>
@else
    <div class="card shadow border-0">
        <div class="card-body">
            <div class="alert alert-info d-flex align-items-center mb-0" role="alert">
                <i class="ti ti-info-circle fs-4 me-2"></i>
                <div>
                    <strong class="text-capitalize">Alerta!</strong>
                    Nenhum tipo de utilizador encontrado.
                </div>
            </div>
        </div>
    </div>
@endif

<?php $_SESSION['title'] = 'Lista de Utilizador'; ?>
<?php $_SESSION['html'] = $content; ?>
<?php $_SESSION['nome_utilizador'] = session('nome_utilizador'); ?>
