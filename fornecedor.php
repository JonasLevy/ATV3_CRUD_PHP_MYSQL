<?php
include_once 'functions.php';
include_once 'conect.php';

$dados = select("fornecedor")


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ATV2</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

  <div class="h-100 d-flex flex-column" style="min-height: 100vh;">
    <?php include_once 'navbar.php' ?>

    <div class="card row col-8 mx-auto my-5 ">
      <div class="card-header bg-secondary fw-bold text-white fs-2 d-flex justify-content-between">
        Fornecedores
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Cadastrar Fornecedor
        </button>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nome</th>
              <th scope="col">Razão social</th>
              <th scope="col">Cnpj</th>
              <th scope="col">Data de cadastro</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($dados as $forn) :
            ?>
              <tr>
                <td><?= $forn['id_fornecedor'] ?></td>
                <td><?= $forn['nome_fornecedor'] ?></td>
                <td><?= $forn['razao_social_fornecedor'] ?></td>
                <td><?= $forn['cnpj_fornecedor'] ?></td>
                <td><?= $forn['data_cadastro_fornecedor'] ?></td>
                <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#excluir-<?= $linha[1] ?>">
                    Apagar
                  </button>

                  <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#editar-<?= $forn['id_fornecedor'] ?>">
                    Editar
                  </button>
                  <!-- MODAL EXCLUIR -->
                  <div class="modal fade" id="excluir-<?= $linha[1] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Excluir <?= $linha[1] ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">
                            <a class="text-light" href="excluirFornecedor.php?cod=<?= $key ?>">Excluir Fornecedor</a>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- MODAL EDITAR -->
                  <div class="modal fade modal-lg" id="editar-<?= $forn['id_fornecedor'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="update.php" method="post">
                          <div class="modal-body">
                            <div class="row g-3">
                              <div class="col-1">
                                <label for="">id:</label>
                                <input type="text" class="form-control" placeholder="Código" aria-label="First name" name="id_fornecedor" required value="<?= $forn['id_fornecedor'] ?>" disabled>
                                <input type="text" class="form-control" placeholder="Código" aria-label="First name" name="id" required value="<?= $forn['id_fornecedor'] ?>" style="display: none;">
                              </div>
                              <div class="col">
                                <label for="">Nome:</label>

                                <input type="text" class="form-control" placeholder="Nome" aria-label="Last name" name="nome_fornecedor" required value="<?= $forn['nome_fornecedor'] ?>">
                              </div>
                            </div>

                            <div class="row g-3 my-2">
                              <div class="col ">
                                <label for="">Razão Social:</label>

                                <input type="text" class="form-control" placeholder="Razão Social" aria-label="First name" name="razao_social_fornecedor" required value="<?= $forn['razao_social_fornecedor'] ?>">
                              </div>
                              <div class="col ">
                                <label for="">CNPJ:</label>
                                <input type="text" class="form-control" placeholder="Preço" aria-label="Last name" name="cnpj_fornecedor" required value="<?= $forn['cnpj_fornecedor'] ?>">
                              </div>
                              <div class="col" style="display: none;">
                                <input type="text" class="form-control" placeholder="razao" aria-label="Last name" name="action" value="fornecedor" required>
                              </div>
                              <div class="col">
                                <label for="">Data de Cadastro:</label>
                                <input type="text" class="form-control" aria-label="Last name" name="data_cadastro_fornecedor" required value="<?= $forn['data_cadastro_fornecedor'] ?>" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal Cadastro -->
    <div class="modal fade modal-lg " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog col-8">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Produto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="insert.php" method="post">
            <div class="modal-body">
              <div class="row g-3">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Nome" aria-label="First name" name="nome_fornecedor" required>
                </div>
                <div class="col" style="display: none;">
                  <input type="text" class="form-control" placeholder="razao" aria-label="Last name" name="action" value="fornecedor" required>
                </div>
              </div>

              <div class="row g-3 my-2">
                <div class="col">
                  <input type="text" class="form-control" placeholder="razao" aria-label="Last name" name="razao_social_fornecedor" required>
                </div>
                <div class="col ">
                  <input type="text" class="form-control" placeholder="Cnpj" aria-label="First name" name="cnpj_fornecedor" required>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>