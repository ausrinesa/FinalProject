<?php

include "./components/head.php";
include "./components/navbar.php";
?>
<h1>
    Walks and hikes
</h1>

<h5> meet your next new adventure here! </h5>


<body>

    <?php include "./components/form.php";
    include "./components/filter.php";
    ?>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>trip id</th>
                    <th>month</th>
                    <th>maximum people</th>
                    <th>distance</th>
                    <th>pets allowed</th>
                    <th>
                        <form method="post" name="participants"> <a href="./participants.php"> registered people</a>
                        </form>
                    </th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trips as $trip) { ?>
                <tr>
                    <td>
                        <?= $trip->id ?>
                    </td>
                    <td>
                        <?= $trip->month ?>
                    </td>
                    <td>
                        <?= $trip->maxPeople; ?>
                    </td>

                    <td>
                        <?= $trip->distance ?> km
                    </td>

                    <td>
                        <?php if (($trip->withAnimals) == 0) {
                        echo "No";
                    } else {
                        echo "Yes";
                    }
                        ?>
                    </td>

                    <td>
                        <?= $trip->registered ?>
                    </td>

                    <td>
                        <div class="d-flex flex-row  mb-3">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $trip->id ?>">
                                <button id="editBtn" class="btn btn-outline-success" type="submit" name="edit"
                                    id="editBtn">
                                    edit
                                </button>
                            </form>

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $trip->id ?>">
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


</body>

</html>