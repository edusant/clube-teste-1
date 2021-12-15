<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include("complemento/estilos")

</head>
{{-- fldkflkdl --}}
<body>
    <div class="tudo">

        <div id="topo">
        @include("complemento/nav")
        @if(Session::has('status'))
        <div class="alert alert-info " role="alert">
            {{Session::get('status')}}
        </div>
        @endif
        </div>

        <div class="conteudo">

             <!-- Page Content -->
  <div class="container ajux">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Produtos
      <small>produtos</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('')}}">Inicio</a>
      </li>
      <li class="breadcrumb-item active">Produto</li>
    </ol>
    <div class="col-md-4 mb-5">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{url('storage/'.$imagem->caminho)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$produto->nome}}</h5>

            </div>
          </div>
        </div>

        <ul class="nav nav-tabs mb-5">
            <li class="nav-item">
              <a class="nav-link active" href="#">Descricao</a>
            </li>

          </ul>

          {{$produto->descricao}}


            </div>
          </div>



  </div>


  <!-- /.container -->





            <div class="rodape">
            @include("complemento/footer")
            </div>
        </div>
        </div>
</body>

</html>
