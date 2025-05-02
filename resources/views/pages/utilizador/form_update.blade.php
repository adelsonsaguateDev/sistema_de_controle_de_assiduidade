<form action="#" id="form_editar_utilizador" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="{{ $utilizador->id }}">
    <div class="row">
        <div class="col-md-6">
            <label for="nome_update">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome_update"
                value="{{ $utilizador->nome }}" aria-describedby="" placeholder="Enter name">
        </div>
        <div class="col-md-6">
            <label for="apelido_update">Apelido</label>
            <input type="text" name="apelido" class="form-control" id="apelido_update"
                value="{{ $utilizador->apelido }}" aria-describedby="" placeholder="Enter name">
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label for="username_update">Nome de utilizador</label>
            <input type="text" name="username" value="{{ $utilizador->username }}" class="form-control"
                id="username_update" aria-describedby="" placeholder="Enter username">
        </div>

        <div class="col-md-6">
            <label for="email_update">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ $utilizador->email }}"
                id="email_update" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

    </div>

    <br>
    <div class="row">
        <div class="col-md-6">
            <label for="contacto_update">Contacto</label>
            <input type="text" maxlength="9" name="contacto" class="form-control" id="contacto_update"
                value="{{ $utilizador->contacto }}" aria-describedby="" placeholder="Enter contact">
        </div>

        <div class="col-md-6">
            <label for="tipo_utilizador_update">Tipo de Utilizaddor</span></label>

            <select class="form-control fom-select" name="tipo_user" id="tipo_utilizador_update">
                <option value="">Selecione...</option>
                @foreach ($tipo_utilizador as $item)
                    <option value="{{ $item->id }}"
                        @php if($utilizador->tipo_user == $item->id):echo "selected"; endif @endphp>{{ $item->nome }}
                    </option>
                @endforeach

            </select>
        </div>



    </div>
    @csrf
</form>
