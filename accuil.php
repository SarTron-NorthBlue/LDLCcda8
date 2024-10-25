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
            <a class="nav-link" href="accuil.php">
            <i class="bi bi-pc-display fs-3"></i>
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="suppression.php">
            <i class="bi bi-trash3 fs-3"></i>
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="ajouter_produit.php">
            <i class="bi bi-upload fs-3"></i>
            </a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="modification.php">
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
    </div>

    <div class="container mt-5">
        <h2>Liste des produits</h2>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="search" placeholder="Recherche par référence" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>
        </div>
        <div class="row" id="produitList">
            <?php foreach ($produits as $produit): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <?php 
                                $icon = 'bi-box';
                                switch (strtolower($produit['composant'])) {
                                    case 'cpu':
                                        $icon = 'bi-cpu';
                                        break;
                                    case 'gpu':
                                        $icon = 'bi-gpu-card';
                                        break;
                                    case 'ram':
                                        $icon = 'bi-memory';
                                        break;
                                    case 'stockage':
                                        $icon = 'bi-hdd';
                                        break;
                                    default:
                                        $icon = 'bi-box';
                                }
                                ?>
                                <i class="bi <?= $icon; ?> fs-3 me-2"></i>
                                <h5 class="card-title mb-0">Marque: <?= htmlspecialchars($produit['marque']); ?></h5>
                            </div>
                            <p class="card-text">Composant: <?= htmlspecialchars($produit['composant']); ?></p>
                            <p class="card-text">Référence: <?= htmlspecialchars($produit['REF']); ?></p>
                            <p class="card-text">Date de création: <?= htmlspecialchars($produit['date_creation']); ?></p>
                            <p class="card-text">Prix: <?= htmlspecialchars($produit['prix']); ?> €</p>
                            <p class="card-text">Quantité: <?= htmlspecialchars($produit['QT']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#produitList .col-md-4').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    </body>
</html>
