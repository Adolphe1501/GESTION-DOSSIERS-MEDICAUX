<div class="row justify-content-center py-5 mx-0">
    <div class="col-sm-4">
        <div class="card card-body shadow-sm">
            <form method="post" action="admin.php?page=controllers/edit-hopital-controller" class="needs-validation" novalidate>

                <div class="text-center my-4">
                    <span class="h3 font-weight-bold text-secondary">Editer Hopital </span>
                </div>
                <input type="hidden" name="hidded_id" value="<?= $hopital['idHopital'] ?>">
             
                <div class="form-group col">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="nomHopital" class="form-control " required id="exampleInputEmail1"  value="<?= $_GET['nomHopital'] ?? $hopital['nomHopital'] ?>" aria-describedby="">
                    </div>
                <div class="form-group col">
                        <label for="email">Phone</label>
                        <input type="number" name="telHopital" class="form-control " required id="email"  value="<?= $_GET['telHopital'] ?? $hopital['telHopital'] ?>" aria-describedby="">
                    </div>
              
                <div class="row justify-content-center">
                    <button type="submit" name="submit_edit_hopital" class="btn btn-secondary col-md-4">Modifier</button>
                </div>
             
            </form>
        </div>
    </div>
</div>