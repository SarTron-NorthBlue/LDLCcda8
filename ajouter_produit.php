<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marque = $_POST['marque'];
    $composant = $_POST['composant'];
    $ref = $_POST['ref'];
    $date_creation = $_POST['date_creation'];
    $prix = $_POST['prix'];
    $qt = $_POST['qt'];

    $sql = "INSERT INTO produits (marque, composant, REF, date_creation, prix, QT) 
            VALUES (:marque, :composant, :ref, :date_creation, :prix, :qt)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':marque' => $marque,
            ':composant' => $composant,
            ':ref' => $ref,
            ':date_creation' => $date_creation,
            ':prix' => $prix,
            ':qt' => $qt,
        ]);

        echo "<script> window.location.href='';</script>";

    } catch (PDOException $e) {
        echo "<script>alert('Erreur : " . $e->getMessage() . "');</script>";
    }
}

// Récupérer les produits de la base de données
$produits = $pdo->query("SELECT * FROM produits ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="fr">
    <link rel="stylesheet" href="style.css">
    <head>
        <title>LDLC</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <div class="container-fluid justify-content-center">
    <ul class="navbar-nav d-flex flex-row">
      <!-- Icons -->
      <li class="nav-item me-3 me-lg-0">
        <a class="nav-link" href="#">
        <i class="bi bi-pc-display fs-3"></i>
        </a>
      </li>
      <li class="nav-item me-3 me-lg-0">
        <a class="nav-link" href="#">
        <i class="bi bi-trash3 fs-3"></i>
        </a>
      </li>
      <li class="nav-item me-3 me-lg-0">
        <a class="nav-link" href="#">
        <i class="bi bi-upload fs-3"></i>
        </a>
      </li>
      <li class="nav-item me-3 me-lg-0">
        <a class="nav-link" href="#">
        <i class="bi bi-pen fs-3"></i>
        </a>
      </li>
    </ul>
  </div>
</nav>


        <header>
            <h1 class="titre1">Bienvenue sur LDLC fait maison</h1>
        </header>

        <div class="card text-center">
          <div class="card-header">Catalogue</div>
          <div class="card-body">
            <h5 class="card-title">Envie d'ajouter un produit ?</h5>
            <p class="card-text">Clique sur juste ici</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajoutProduitModal">
              Ajouter un produit
            </button>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ajoutProduitModal" tabindex="-1" aria-labelledby="ajoutProduitModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ajoutProduitModalLabel">Ajouter un produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="ajoutProduitForm" action="" method="POST">
                  <div class="mb-3">
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" class="form-control" id="marque" name="marque" required>
                  </div>
                  <div class="mb-3">
                    <label for="composant" class="form-label">Composant</label>
                    <input type="text" class="form-control" id="composant" name="composant" required>
                  </div>
                  <div class="mb-3">
                    <label for="ref" class="form-label">Référence</label>
                    <input type="text" class="form-control" id="ref" name="ref" required>
                  </div>
                  <div class="mb-3">
                    <label for="dateCreation" class="form-label">Date de création</label>
                    <input type="date" class="form-control" id="dateCreation" name="date_creation" required>
                  </div>
                  <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
                  </div>
                  <div class="mb-3">
                    <label for="qt" class="form-label">Quantité</label>
                    <input type="text" class="form-control" id="qt" name="qt" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>

        <div class="container mt-5">
            <h2>Liste des produits ajoutés</h2>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="search" placeholder="Recherche par référence" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marque</th>
                        <th>Composant</th>
                        <th>Référence</th>
                        <th>Date de création</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                    </tr>
                </thead>
                <tbody id="produitTable">
                    <?php foreach ($produits as $produit): ?>
                    <tr>
                        <td><?= htmlspecialchars($produit['id']); ?></td>
                        <td><?= htmlspecialchars($produit['marque']); ?></td>
                        <td><?= htmlspecialchars($produit['composant']); ?></td>
                        <td><?= htmlspecialchars($produit['REF']); ?></td>
                        <td><?= htmlspecialchars($produit['date_creation']); ?></td>
                        <td><?= htmlspecialchars($produit['prix']); ?></td>
                        <td><?= htmlspecialchars($produit['QT']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#search').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('#produitTable tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </body>
</html>
