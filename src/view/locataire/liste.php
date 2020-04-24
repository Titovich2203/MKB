<?php
require_once  '../../model/locataireBd.php';
$passagers = getAllPassagers();
$locataires = getAllLocataire();
include '../../header.php';
?>
    <br>
    <h1 class="display-4 text-center" style="margin-left:15px">LISTE DES LOCATAIRES PASSAGERS</h1>
    <br>
    <div class="content" id="ajax-content">
        <table class="table table-responsive-lg table-striped table-bordered btn-table">

            <thead>
            <tr>
                <th>#</th>
                <th>NUMERO</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>TEL</th>
                <th>CHAMBRE</th>
                <th>PERIODE</th>
                <th>ACTIONS</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $i = 0;
            foreach ($passagers as $key => $c) {
                $i++;
                ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $c['numero'] ?></td>
                    <td><?= $c['nom'] ?></td>
                    <td><?= $c['prenom'] ?></td>
                    <td><?= $c['tel'] ?></td>
                    <td><?= $c['adresse'] ?> - <?= $c['montant'] ?></td>
                    <td><?= $c['dateDebut'] ?> - <?= $c['dateFin'] ?></td>
                    <td>
                        <button class="btn btn-danger delLoc" idS="<?= $c['id'] ?>" > SUPPRIMER </button>
                        <?php
                        if($c['statut'] == '0') {
                            ?>
                            <a href="/MKB/accueil">
                                <button class="btn btn-primary " idS="<?= $c['id'] ?>"> VALIDER PAYEMENT</button>
                            </a>
                            <?php
                        }
                            ?>
                    </td>
                </tr>
            <?php }
            ?>
            </tbody>

        </table>
    </div>
    <br><br>
    <h1 class="display-4 text-center" style="margin-left:15px">LISTE DES LOCATAIRES</h1>
    <br>
    <div class="content" id="ajax-content">
        <table class="table table-responsive-lg table-striped table-bordered btn-table">

            <thead>
            <tr>
                <th>#</th>
                <th>NUMERO</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>TEL</th>
                <th>CHAMBRE</th>
                <th>ACTIONS</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $i = 0;
            foreach ($locataires as $key => $c) {
                $i++;
                ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $c['numero'] ?></td>
                    <td><?= $c['nom'] ?></td>
                    <td><?= $c['prenom'] ?></td>
                    <td><?= $c['tel'] ?></td>
                    <td><?= $c['adresse'] ?> - <?= $c['montant'] ?></td>
                    <td>
                        <button class="btn btn-danger delLoc" idS="<?= $c['id'] ?>" > SUPPRIMER </button>
                    </td>
                </tr>
            <?php }
            ?>
            </tbody>

        </table>
    </div>

<?php
include '../../footer.php';