<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include("complemento/estilos")

</head>

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
            <a href="{{url('')}}">inicio</a>
        </li>

      <li class="breadcrumb-item active">produtos</li>


    </ol>



<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>preço</th>
                <th>ação</th>
            </tr>
        </thead>
        <tbody>



                @forelse ($produtos as $produto)
                <tr>
        <td scope="row">{{$produto->id}}</td>
        <td>{{$produto->nome}}</td>
        <td>{{$produto->preco}}</td>
        <td><a href="{{route('adm.editar.produto', [$produto->id])}}" class="btn btn-primary">Editar</a>

            <a href="{{route('ver.produto', [$produto->id])}}" class="btn btn-primary">Ver</a>

        </td>
    </tr>
    @empty

    @endforelse



        </tbody>
    </table>




</div>

{{$produtos->links()}}
  </div>


  <!-- /.container -->




            <div class="rodape">
            @include("complemento/footer")
            </div>
        </div>
        </div>
</body>

</html>
