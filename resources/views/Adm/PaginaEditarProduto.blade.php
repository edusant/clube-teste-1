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
      <a href="{{url('')}}">Inicio</a>
      </li>
      <li class="breadcrumb-item active">Editar Produto</li>
    </ol>
    <div class="col-md-4 mb-5">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{url('storage/'.$imagem->caminho)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$produto->nome}}</h5>
               @include('complemento.EditarNomeImagem')
            </div>
          </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informações</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form action="{{route('adm.editar.produto.post')}}" method="post">

                    @csrf
                   <div id="mostrar">
                        <label>preço</label>
                        <input type="text" value="{{$produto->preco}}" class="form form-control" name="preco">
                        <label>Descrição do produto</label>
                        <textarea name="descricao" class="form form-control">{{$produto->descricao}}</textarea>
                        <input type="hidden" name="produto_id" value="{{$produto->id}}">
                        <br>
                   </div>
                    <button type="submit" class="btn btn-info mt-3" id="bt">Editar</button>
                </form>
            </div>

            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
          </div>



  </div>


  <!-- /.container -->




<!-- Modal -->
<div class="modal fade" id="AparaOProduto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Arquivar o produto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form method="POST" action="{{route('adm.arquivar.produto')}}">
                        @csrf
            <div class="modal-body">

                <div class="container-fluid">
                    Tem certeza que deseja arquivar o produto?
                    <input type="hidden" name="produto_id" value="{{$produto->id}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Arquivar</button>
            </div>
                    </form>
        </div>
    </div>
</div>

            <div class="rodape">
            @include("complemento/footer")
            </div>
        </div>
        </div>
</body>

</html>
