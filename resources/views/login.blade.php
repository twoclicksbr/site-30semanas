@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')

    <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-light-100 text-white"
        data-image-src="https://30semanas.com.br//assets/img/photos/bg26.jpg"
        style="background-image: url('https://30semanas.com.br/assets/img/photos/bg26.jpg');">
        <div class="container pt-17 pb-20 pt-md-19 pb-md-21 text-center">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    {{-- <h1 class="display-1 mb-3 text-white"> Alex </h1> --}}

                </div>
            </div>
        </div>
    </section>

    <section class="wrapper mb-10">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-xxl-7 mx-auto mt-n20">
                    <div class="card">
                        <div class="card-body p-11 ">


                            <h2 class="mb-3 text-start">Bem Vindo de Volta</h2>
                            <p class="lead mb-6 text-start">Preencha seu e-mail e senha para entrar.</p>

                            


                            {{-- <form class="text-start mb-3" method="POST" >
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" placeholder="Email" id="email"
                                        name="email">
                                    <label for="email">Email: <span class="text-orange"><i
                                                class="uil uil-asterisk"></i></span></label>
                                </div>
                                <div class="form-floating password-field mb-4">
                                    <input type="password" class="form-control" placeholder="Password" id="senha"
                                        name="senha">
                                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                    <label for="senha">Senha: <span class="text-orange"><i
                                                class="uil uil-asterisk"></i></span></label>
                                </div>

                                <input type="hidden" name="crud" value="login">
                                <button type="submit"
                                    class="btn btn-orange btn-icon btn-icon-start rounded btn-login w-100 mb-2"><i
                                        class="uil uil-signin"></i> Entrar e Partilhar</button>
                                <!-- <a class="btn btn-orange rounded-pill btn-login w-100 mb-2">Entrar</a> -->
                            </form> --}}

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif


                            <form class="text-start mb-3" method="POST" action="{{ route('login.process') }}">
                                @csrf
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" placeholder="Email" id="email"
                                        name="email" required>
                                    <label for="email">Email: <span class="text-orange"><i
                                                class="uil uil-asterisk"></i></span></label>
                                </div>
                                <div class="form-floating password-field mb-4">
                                    <input type="password" class="form-control" placeholder="Password" id="password"
                                        name="password" required>
                                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                    <label for="password">Senha: <span class="text-orange"><i
                                                class="uil uil-asterisk"></i></span></label>
                                </div>

                                <button type="submit"
                                    class="btn btn-orange btn-icon btn-icon-start rounded btn-login w-100 mb-2">
                                    <i class="uil uil-signin"></i> Entrar e Partilhar
                                </button>
                            </form>


                            <p class="mb-2 text-center">Não lembra sua senha? <a
                                    href="https://30semanas.com.br/entrar/rec_senha" class="hover text-orange">Perdi minha
                                    senha</a></p>

                            <p class="mb-1 mt-5 text-center">
                                <a href="/" class="hover text-orange"><i class="uil uil-corner-up-left-alt"></i>
                                    Voltar para Página Principal</a>
                            </p>

                            {{-- <hr class="mb-5 mt-5"> --}}

                            <!-- <p class="mb-0 text-center">Não tem uma conta? <a href="https://30semanas.com.br/entrar/novo" class="hover text-orange">Inscrever-se</a></p> -->

                            <!-- <p class="mb-0 text-center">30 semanas na sua Igreja? <a href="https://30semanas.com.br/entrar/novo_igreja" class="hover text-orange">Cadastre sua Igreja</a></p> -->



                            {{-- <p class="mb-2 text-center">
                                Pastor / Líder?
                                <a href="https://30semanas.com.br/entrar/cad_igreja" class="hover text-orange">
                                    Cadastre sua Igreja
                                </a>
                            </p> --}}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
