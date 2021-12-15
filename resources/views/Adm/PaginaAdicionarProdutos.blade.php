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
      <small> produtos</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('')}}">inicio</a>
        </li>

      <li class="breadcrumb-item active">produtos</li>


    </ol>

    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#contentId" aria-expanded="false"
                aria-controls="contentId">
            Cadastrar Produtos
        </button>
    </p>
    <div class="collapse" id="contentId">

    <form action="{{route('CadastrodeProduto')}}" method="post" enctype="multipart/form-data">

        @csrf

       <h6>Cadastro de produto ou trabalho</h6>

       <div id="mostrar">
            <label>Nome do produto</label>
            <input type="text" class="form form-control" name="nome">
            <label>preco</label>
            <input type="text" class="form form-control" name="preco">
            <label>Descrição do produto</label>
            <textarea name="descricao" class="form form-control">
            </textarea>

            <br>
            <input type="file"  name="imgpro" multiple>
            <br>
       </div>




        <button type="submit" class="btn btn-info mt-3" id="bt">Cadastrar</button>

    </form>



    </div>

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
        <td><a href="{{route('adm.editar.produto', [$produto->id])}}" class="btn btn-primary">Editar</a></td>
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
