<?php include "./components/head.php";
include "./components/navbar.php"; ?>



<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>month</th>
                <th>participant surname</th>
                <th>participant name</th>

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




</div>
</td>

</tr>
<?php } ?>
</tbody>
</table>
</div>

</body>

</html>