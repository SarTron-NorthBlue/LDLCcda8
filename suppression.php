<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    // Suppression d'un produit
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM produits WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $delete_id]);
        echo "<script> window.location.href='';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Erreur lors de la suppression : " . $e->getMessage() . "');</script>";
    }
}

// Récupérer les produits de la base de données
$produits = $pdo->query("SELECT * FROM produits ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="fr">
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
    <style>
        .titre1 {
            text-align: center;
        }
    </style>
</header>

<div class="container mt-5">
    <h2>Liste des produits</h2>
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
                <th>Action</th>
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
                <td>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $produit['id']; ?>">
                        <i class="bi bi-trash"></i> Supprimer
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce produit ?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="" method="POST">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
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

        // Ouvrir le modal avec l'ID du produit sélectionné
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Bouton qui a déclenché le modal
            var productId = button.data('id'); // Récupérer l'ID du produit
            var modal = $(this);
            modal.find('#delete_id').val(productId); // Insérer l'ID dans le formulaire caché
        });
    });
</script>
</body>
</html>
