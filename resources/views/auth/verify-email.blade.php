@php
    $titulo = 'Auth';
@endphp
<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include("complemento/estilos")

</head>

<body>
    <div class="tudo">

        <div id="topo">
        @include("complemento/nav")
        </div>

        <div class="conteudo">
            <div class="container">


                 <!-- Page Heading/Breadcrumbs -->


      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->


        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
            @if(Session::has('status'))
            <div class="alert alert-info " role="alert">
                {{Session::get('status')}}
            </div>
            @endif

          <form action="{{route('verification.send')}}" method="POST">
                @csrf
                <h2>Enviaremos um link para o seu email</h2>

                <button type="submit">solicitar link</button>


        </form>

        </div>
      </div>
      <!-- /.row -->


            </div>
            <div class="rodape">
            @include("complemento/footer")
            </div>
        </div>
    </div>
    <style type="text/css">
        a[disabled="disabled"] {
            pointer-events: none;
        }
    </style>
</body>

</html>
