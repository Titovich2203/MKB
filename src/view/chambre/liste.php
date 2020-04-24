<?php
require_once  '../../model/chambreBd.php';
$chambres = getAllChambres();
include '../../header.php';
?>
<br>
<h1 class="display-4" style="margin-left:15px">LISTE DES CHAMBRES</h1>
<br>
<div class="content" id="ajax-content">
    <table class="table table-responsive-lg table-striped table-bordered btn-table">

        <thead>
        <tr>
            <th>#</th>
            <th>NUMERO</th>
            <th>ADRESSE</th>
            <th>MONTANT</th>
            <th>TYPE CHAMBRE</th>
            <th>ACTIONS</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $i = 0;
        foreach ($chambres as $key => $c) {
            $i++;
            ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $c['numero'] ?></td>
                <td><?= $c['adresse'] ?></td>
                <td><?= $c['montant'] ?></td>
                <td><?= $c['libelle'] ?></td>
                <td>
                    <button class="btn btn-danger delCompte" idS="<?= $c['id'] ?>" > SUPPRIMER </button>
                    <a href="/MKB/calendar"><button class="btn btn-primary " idS="<?= $c['id'] ?>" > VERIFIER DISPONIBILITE </button></a>
                </td>
            </tr>
        <?php }
        ?>
        </tbody>

    </table>
</div>

<?php
include '../../footer.php';