<?php if (isset($registrationNumber_error)) : ?>
    <div class="row mx-0 pt-4 justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $registrationNumber_error ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($registrationNumber_error)) : ?>
    <div class="row mx-0 pt-4 justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $registrationNumber_error ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($phone_error)) : ?>
    <div class="row mx-0 pt-4 justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $phone_error ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($error) && $error == true) : ?>
    <div class="row mx-0 pt-4 justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Remplisses tout les champs obligatoire!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>