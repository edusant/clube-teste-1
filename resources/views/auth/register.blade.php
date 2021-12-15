@php
    $titulo = "Cadastro ";
@endphp
<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include("complemento/estilos")
    <meta name="robots" content="noindex">
</head>

<body class=" ">
    <div class="tudo">

        <div id="topo">

            @include("complemento/nav")




        </div>

        <div class="conteudo ">
            <div class="container ajux todatela ">

                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <section class="mt-5">


                            @if (isset($_GET['email']))
                            <div class="form-group row">
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Termine o seu cadastro</h4>
                                    <p>Basta preencher o seu nome e senha para terminar o seu cadastro</p>
                                    <p class="mb-0"></p>
                                </div>
                            </div>

                            @endif
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label h1 text-md-right">{{ __('Nome') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    @if (isset($_GET['email']))
                                    <label for="email" class="col-md-4 col-form-label h1 text-md-right">{{ __('E-Mail') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $_GET['email'] }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    @else

                                    <label for="email" class="col-md-4 col-form-label h1 text-md-right">{{ __('E-Mail') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endif


                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label h1 text-md-right">{{ __('Senha') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" name="confimarLGPD" required id="confimar" {{ old('confimar') ? 'checked' : '' }}>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Criar conta') }}
                                        </button>


                                    </div>


                                </div>
                            </form>
                        </section>
                    </div>


                </div>



            </div>


        </div>

        <div class="rodape">
            @include("complemento/footer")
        </div>

    </div>
</body>

</html>
