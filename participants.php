<?php include "./components/head.php";
include "./components/navbar.php"; ?>




<div class="container" id="participant">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>month</th>
                <th>participant surname</th>
                <th>participant name</th>
                <th>action</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($participants as $participant) { ?>
            <tr>
                <td>
                    <?= $participant->month ?>
                </td>
                <td>
                    <?= $participant->surname; ?>
                </td>
                <td>
                    <?= $participant->name ?>
                </td>
                <td>
                    <div class="d-flex flex-row  mb-3">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $participant->id ?>">
                            <button id="editBtn" class="btn btn-outline-success" type="submit" name="edit" id="editBtn">
                                edit
                            </button>
                        </form>

                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $participant->id ?>">
                            <button id="deleteBtn" class="btn btn-outline-danger" type="submit" name="destroy"
                                id="deleteBtn">
                                delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>