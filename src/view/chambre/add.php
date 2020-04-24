<?php
require_once '../../model/chambreBd.php';
$numCh = genererNumCh();
$typesCh = getTypesCh();
include '../../header.php';
?>

    <br>
    <h1 class="display-4" align="center" >NOUVELLE CHAMBRE</h1>
<?php
if (isset($_GET['ok'])) {
    echo $_GET['ok'];
    if($_GET['ok'] == '1'){
        ?>
        <h1 class="display-6" align="center" style="color: green" >CHAMBRE AJOUTEE AVEC SUCCES</h1>
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
            <form method="POST" action="/MKB/chambreC">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="numero" class="form-control" value="<?= $numCh ?>" type="text" readonly>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-hotel"></i> </span>
                    </div>
                    <select name="typeCh" class="custom-select" id="typeCh" >
                        <?php
                        foreach ($typesCh as $key => $value)
                        {
                            ?>
                            <option><?= $value['libelle'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                    </div>
                    <input name="adresse" class="form-control" placeholder="Adresse" type="text" required>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-money"></i> </span>
                    </div>
                    <input name="montant" class="form-control" value="15000" min="5000" placeholder="montant" type="number" required>
                    <input name="" class="form-control" value="/jour" type="text" id="forfaitCh" readonly required>
                </div>
                <div class="form-group">
                    <button type="submit" name="ajoutChambre" class="btn btn-success btn-block"> Add Chambre  </button>
                </div> <!-- form-group// -->

            </form>
        </article>
    </div>

<?php
include '../../footer.php';