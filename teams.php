<?php

require_once('database.php');

$conn = connect($servername, $username, $password, $database);

$result = getAllTeams($conn);

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drużyny</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/211f480bf4.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- TOP NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="index.php">Zawody pływania</a>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contenders.php">Zawodnicy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teams.php">Drużyny</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="competitions.php">Zawody</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <!-- DELETE MODAL -->

    <div class="modal fade" id="ContenderDeletionModal" tabindex="-1" role="dialog"
        aria-labelledby="ContenderDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ContenderDeletionModalLabel">Usuwanie drużyny</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="" />
                        <label class="form-check-label" for=""> Czy na pewno chcesz usunąć drużynę? </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-danger">Usuń</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END OOF DELETE MODAL -->
    <div class="container">


        <!-- <a href="form/create_team_form.php">Stwórz Drużynę</a> -->
        <a name="Team Creation" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg"
            href="form/create_team_form.php" role="button">Dodaj
            drużynę</a>
        <!-- MAIN TEAM TABLE -->
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-light align-middle">
                <thead class="table-dark">
                    <caption>
                        Drużyny
                    </caption>
                    <tr>
                        <th>#</th>
                        <th>Nazwa Drużyny</th>
                        <th>Rozmiar drużyny</th>
                        <th>Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row['Name'] ?></td>
                            <td><?= $row['Size'] ?></td>

                            <td class="d-flex justify-content-around">
                                <a name="" id="" class="btn btn-primary"
                                    href="team_contenders.php?TeamID=<?= $row['teams_id'] ?>" role="button"><i
                                        class="fa-solid fa-users"></i></a>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#ContenderDeletionModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

<?php

$conn->close();

?>

</html>