@extends('layouts.app')

@section('content')
    <div class="auth-wrapper v2">
        <div class="auth-sidecontent">
            <img src="../assets/images/authentication/img-auth-sideimg.jpg" alt="images" class="img-fluid img-auth-side" />
        </div>
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <div class="text-center">
                        <a href="#"><img src="../assets/images/logo-dark.svg" alt="img" /></a>
                    </div>
                    <div class="saprator my-3"><span></span></div>
                    <h3 class="text-center f-w-500 mb-3">Sistema de Controle de Assiduidade</h3>
                    <div class="saprator my-3"><span></span></div>
                    <form action="{{ route('autenticar') }}" id="frm_login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input id="username" name="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" value="" 
                                autocomplete="" autofocus placeholder="Nome do Utilizador">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input id="password" name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" value=""
                                 autocomplete="" placeholder="Digite a senha">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex mt-1 justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                    checked="" />
                                <label class="form-check-label text-muted" for="customCheckc1">Lembrar-me?</label>
                            </div>
                            <h6 class="text-secondary f-w-400 mb-0">
                                <a href="forgot-password-v2.html">Esqueceu a senha?</a>
                            </h6>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                            <span class="spinner-border spinner-border-sm spin" role="status" aria-hidden="true"
                                hidden></span>
                            <span class="carregando" hidden>Carregando...</span>
                        </div>
                        {{-- <div class="d-flex justify-content-between align-items-end mt-4">
                        <h6 class="f-w-500 mb-0">Don't have an Account?</h6>
                        <a href="register-v2.html" class="link-primary">Create Account</a>
                        </div> --}}
                        @csrf

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
