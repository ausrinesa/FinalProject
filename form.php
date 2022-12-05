<?php include "./components/head.php";
include "./components/navbar.php"; ?>

<div class="container col-lg-4" id="form">
    <form method="POST">

        <div class="mb-3">
            <label for="month" class="form-label">Month</label>
            <input type="text" name='month' class="form-control" id="month" value=<?=($edit) ? "'$trip->month'" : "" ?>>
        </div>

        <div class="mb-3">
            <label for="maxPeople" class="form-label">Maximum people</label>
            <input type="number" step="1" min="1" name='maxPeople' class="form-control" id="maxPeople" value=<?=($edit)
                ? "'$trip->maxPeople'" : "" ?>>
        </div>

        <div class="mb-3">
            <label for="distance" class="form-label">Distance(km)</label>
            <input type="number" name='distance' min="1" step="1" class="form-control" id="distance" value=<?=($edit) ?
       $trip->distance : "" ?>>
        </div>

        <label for="withAnimals">Pets allowed?</label>
        <select class="form-select form-control filter" name="withAnimals" id="withAnimals">
            <?php
            if ($edit) {
                if (($trip->withAnimals) == 0) { ?>
            <option selected value="0">No</option>
            <option value="1">Yes</option>
            <?php } else { ?>
            <option selected value="1">Yes</option>
            <option value="0">No</option>
            <?php }
            } else { ?>
            <option selected disabled value=""> please select preference </option>
            <option value="0">No</option>
            <option value="1">Yes</option>
            <?php } ?>
        </select>

        <?php if ($edit) { ?>
        <input type="hidden" name="id" value="<?= $trip->id ?>">
        <button type="submit" id="updateBtn" name="update" class="btn"> Update</button>
        <?php } else { ?>
        <button type="submit" name="save" class="btn btn-primary mt-3 mb-3" id="saveBtn">Save</button>
        <?php } ?>
    </form>
</div>