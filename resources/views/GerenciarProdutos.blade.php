<!DOCTYPE html>
<html lang="pt-br">

<head>

    @include("complemento/estilos")

<body>
  <div class="tudo">

    <div id="topo">



      @include("complemento/nav")
    </div>
    <div class="conteudo">
        <header>


        </header>

          <!-- Page Content -->
          <div class="container ajux">

            <div class="modal-body">
                <h1>Cadastro de produtos</h1>

                <form action="" method="post">
                    <div class="form-group">
                      <label for="">Nome</label>
                      <input type="text" class="form-control" name="nome" id=""  placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">subtitulo</label>
                        <input type="text" class="form-control" name="nome" id=""  placeholder="">
                      </div>

                      <div class="form-group">
                        <label for="">url vídeo de apresentação</label>
                        <input type="text" class="form-control" name="nome" id=""  placeholder="">
                      </div>
                    @csrf

                    <div class="form-group">
                        <label for="">Descrição serviço</label>
                        <textarea name="descricao_servico" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">ficha tecnica</label>
                        <textarea name="descricao_servico" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="">Palavras chaves</label>
                        <textarea name="descricao_servico" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="">imagem</label>
                      <input type="file" class="form-control-file" name="" id="" placeholder="" aria-describedby="fileHelpId">
                      <small id="fileHelpId" class="form-text text-muted">Help text</small>
                    </div>





                    <div class="form-group">
                        <label for="">Preço</label>
                        <input type="text" class="form-control" name="preco" id=""  placeholder="">
                    </div>



            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
              Cadastrar produto
            </button>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Arthermy cadastrar produto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">

                            <form action="" method="post">
                                <div class="form-group">
                                  <label for="">Nome</label>
                                  <input type="text" class="form-control" name="nome" id=""  placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="">subtitulo</label>
                                    <input type="text" class="form-control" name="nome" id=""  placeholder="">
                                  </div>

                                  <div class="form-group">
                                    <label for="">url vídeo de apresentação</label>
                                    <input type="text" class="form-control" name="nome" id=""  placeholder="">
                                  </div>
                                @csrf

                                <div class="form-group">
                                    <label for="">Descrição serviço</label>
                                    <textarea name="descricao_servico" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">ficha tecnica</label>
                                    <textarea name="descricao_servico" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="">Palavras chaves</label>
                                    <textarea name="descricao_servico" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                  <label for="">imagem do produto</label>
                                  <input type="text"
                                      class="form-control form-control-sm" name="" id="" aria-describedby="helpId" placeholder="">
                                  <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>





                                <div class="form-group">
                                    <label for="">Preço</label>
                                    <input type="text" class="form-control" name="preco" id=""  placeholder="">
                                </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
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
