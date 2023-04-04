<?php
include_once 'functions.php';
include_once 'conect.php';

$dados = select("cliente")


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
        Clientes
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Cadastrar Cliente
        </button>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Telefone</th>
              <th scope="col">CPF</th>
              <th scope="col">Data de cadastro</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($dados as $forn) :
            ?>
              <tr>
                <td><?= $forn['id_cliente'] ?></td>
                <td><?= $forn['nome_cliente'] ?></td>
                <td><?= $forn['email_cliente'] ?></td>
                <td><?= $forn['phone_cliente'] ?></td>
                <td><?= $forn['cpf_cliente'] ?></td>
                <td><?= $forn['data_cadastro_fornecedor'] ?></td>
                <td>
                  <button class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editar-<?= $forn['id_cliente'] ?>">
                    Editar
                  </button>
                  <button type="button" class="btn  btn-danger " data-bs-toggle="modal" data-bs-target="#excluir-<?= $forn['id_cliente'] ?>">
                    Apagar
                  </button>
                  <!-- MODAL EXCLUIR -->
                  <div class="modal fade" id="excluir-<?= $forn['id_cliente'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Excluir <?= $forn['id_cliente'] ?>
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
                  <div class="modal fade modal-lg" id="editar-<?= $forn['id_cliente'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" class="form-control" aria-label="Last name" name="id_cliente" required value="<?= $forn['id_cliente'] ?>" disabled>
                              </div>

                              <div class="col-1" style="display: none;">
                                <input type="text" class="form-control" aria-label="Last name" name="id" required value="<?= $forn['id_cliente'] ?>" >
                              </div>

                              <div class="col" style="display: none;">
                                <input type="text" class="form-control" placeholder="razao" aria-label="Last name" name="action" value="cliente" required>
                              </div>

                              <div class="col">
                                <input type="text" class="form-control" placeholder="Código" aria-label="First name" name="nome_cliente" required value="<?= $forn['nome_cliente'] ?>">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" placeholder="Nome" aria-label="Last name" name="email_cliente" required value="<?= $forn['email_cliente'] ?>">
                              </div>
                            </div>

                            <div class="row g-3 my-2">
                              <div class="col ">
                                <input type="text" class="form-control" placeholder="Estoque" aria-label="First name" name="phone_cliente" required value="<?= $forn['phone_cliente'] ?>">
                              </div>
                              <div class="col ">
                                <input type="text" class="form-control" placeholder="Preço" aria-label="Last name" name="cpf_cliente" required value="<?= $forn['cpf_cliente'] ?>">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" aria-label="Last name" name="data_cadastro_cliente" required value="<?= $forn['data_cadastro_fornecedor'] ?>" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                        <div class="modal-footer">
                        </div>
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Cliente</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="insert.php" method="post">
            <div class="modal-body">
              <div class="row g-3">
                <div class="col-7">
                  <input type="text" class="form-control" placeholder="Nome" aria-label="First name" name="nome_cliente" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Telefone" aria-label="Last name" name="phone_cliente" required>
                </div>
                <div class="col" style="display: none;">
                  <input type="text" class="form-control" placeholder="razao" aria-label="Last name" name="action" value="cliente" required>
                </div>
              </div>

              <div class="row g-3 my-2">
                <div class="col-7">
                  <input type="text" class="form-control" placeholder="Email" aria-label="Last name" name="email_cliente" required>
                </div>
                <div class="col ">
                  <input type="text" class="form-control" placeholder="CPF" aria-label="First name" name="cpf_cliente" required>
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