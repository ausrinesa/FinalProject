<?php include "./components/head.php";
include "./components/navbar.php"; ?>

<div class="container col-lg-4" id="form">
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name='name' class="form-control" id="name" value=<?=($edit) ? "'$participant->name'" : ""
                ?>>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label"> Surname </label>
            <input type="text" name='surname' class="form-control" id="surname" value=<?=($edit) ?
                "'$participant->month'" : "" ?>>
        </div>

        <div class="col-auto">
            <select class="form-select form-control filter" name="tripId" aria-label="Default select example"
                id="tripId">
                <option value="" selected> Month </option>
                <?php foreach ($trips as $key => $trip) { ?>
                <option value=" <?= $trip->id ?>">
                    <?= $trip->month ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" name="savePar" class="btn btn-primary mt-3 mb-3" id="saveBtn">Save</button>
    </form>
</div>