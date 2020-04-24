<?php
require_once '../../model/locataireBd.php';
require_once '../../model/chambreBd.php';
$numC = "";
$num = genererNumLoc();
$chammbres = getAllChambres();
include '../../header.php';
?>

    <br>
    <h1 class="display-4" align="center" >NOUVEAU LOCATAIRE</h1>
<?php
if (isset($_GET['ok'])) {
//    echo $_GET['ok'];
    if($_GET['ok'] == '1'){
        ?>
        <h1 class="display-6" align="center" style="color: green" >LOCATAIRE AJOUTE AVEC SUCCES</h1>
        <?php
    }
    else{
        ?>
        <h1 class="display-6" align="center" style="color: red" >ECHEC D'AJOUT</h1>
        <?php
    }
}
?>

    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <p class="divider-text">
                <span class="bg-light">LOCATAIRE</span>
            </p>
            <form method="POST" action="/MKB/locataireC">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="numLoc" class="form-control" value="<?= $num ?>" type="text" readonly>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="nom" class="form-control" placeholder="Nom" type="text" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="prenom" class="form-control" placeholder="Prenom" type="text" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <select name="ind" class="custom-select" style="max-width: 120px;">
                        <option selected="">+221</option>
                        <?php
                        for ($i=223; $i <= 239; $i+=2) {
                            ?>
                            <option>+<?= $i ?></option>
                            <?php
                            if ($i == 227) {
                                echo "<option>+$i</option>";
                            }
                        }
                        ?>
                    </select>
                    <input name="tel" class="form-control" value="770000000" max="789999999" placeholder="Phone number" type="number" required>
                </div>
                <p class="divider-text">
                    <span class="bg-light">CHAMBRE</span>
                </p>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                    </div>
                    <select name="choixChambre" id="choixChambre" class="custom-select">
                        <?php
                        foreach ($chammbres as $key => $c)
                        {
                            ?>
                            <option value="<?= $c['numero'] ?>" ><?= $c['adresse'] ?> - <?= $c['libelle'] ?> - <?= $c['montant'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div id="dateDiv">
                <p class="divider-text">
                    <span class="bg-light">DATE D'ENTREE</span>
                </p>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                    </div>
                    <input name="dateDebut" id="dateDebut" class="form-control" placeholder="Date de debut" type="date">
                </div>
                <p class="divider-text">
                    <span class="bg-light">DATE DE SORTIE</span>
                </p>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
                    </div>
                    <input name="dateSortie" id="dateSortie" class="form-control" placeholder="Date de debut" type="date">
                </div>


                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-money"></i> </span>
                    </div>
                    <input name="montant" id="montantLoc" class="form-control" placeholder="montant" type="number" required readonly>
                    <input name="" class="form-control" value="FCFA" type="text" readonly required>
                </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="addLocataire" id="addLocataire" class="btn btn-success btn-block"> Create Occupant  </button>
                </div> <!-- form-group// -->

            </form>
        </article>
    </div> <!-- card.// -->




    </div>
    <!--container end.//-->


<?php
include '../../footer.php';