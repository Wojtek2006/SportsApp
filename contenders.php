<?php

require_once('database.php');

$conn = connect($servername, $username, $password, $database);

$result = getAllContenders($conn);


?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zawodnicy</title>
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

    <!-- Modal modyfikacji zawodnika-->
    <div class="modal fade" id="ContenderCreationModal" tabindex="-1" role="dialog"
        aria-labelledby="ContenderCreationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ContenderCreationModalLabel">Wprowadzanie danych zawodnika</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Imię</label>
                                <input type="text" name="" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId" />
                                <!-- <small id="helpId" class="text-muted">Help text</small> -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Nazwisko</label>
                                <input type="text" name="" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId" />
                                <!-- <small id="helpId" class="text-muted">Help text</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Klasa</label>
                                <input type="text" name="" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId" />
                                <small id="helpId" class="text-muted">max. 3 znaki</small>
                            </div>
                        </div>
                        <div class="col ">
                            <label for="" class="form-label">Płeć</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="" />
                                <label class="form-check-label" for=""> Kobieta </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="" checked />
                                <label class="form-check-label" for=""> Mężczyzna </label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Status</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="" />
                                <label class="form-check-label" for=""> Cywil </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="" checked />
                                <label class="form-check-label" for=""> Wojskowy </label>
                            </div>
                        </div>
                    </div>

                    <!-- <label for="FirstName">Imie: </label>
                    <input type="text" name="FirstName" id="FirstName">
                    <label for="LastName">Nazwisko: </label>
                    <input type="text" name="LastName" id="LastName">
                    <label for="Class">Klasa: </label>
                    <input type="text" name="Class" id="Class">
                    <label for="Gender">Płeć: </label>
                    <select name="Gender" id="Gender">
                        <option value="K">Kobieta</option>
                        <option value="M">Mężczyzna</option>
                    </select>
                    <label for="Status">Status: </label>
                    <select name="Status" id="Status">
                        <option value="C">Cywil</option>
                        <option value="W">Wojskowy</option>
                    </select> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-primary">Zapisz</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ContenderDeletionModal" tabindex="-1" role="dialog"
        aria-labelledby="ContenderDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ContenderDeletionModalLabel">Usuwanie danych zawodnika</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="" />
                        <label class="form-check-label" for=""> Czy na pewno chcesz usunąć zawodnika? </label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                    <button type="button" class="btn btn-danger">Usuń</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTAINER -->
    <div class="container">
        <a name="Contender Creation" class="btn btn-warning mx-auto d-block w-25 my-4 btn-lg"
            href="form/create_contender_form.php" role="button">Dodaj
            zawodnika</a>
        <!-- <a href="form/create_contender_form.php">Stwórz Zawodnika</a> -->

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-light align-middle">
                <thead class="table-dark">
                    <caption>
                        Zawodnicy
                    </caption>
                    <tr>
                        <th>#</th>
                        <th>Imie</th>
                        <th>Nazwisko</th>
                        <th>Klasa</th>
                        <th>Płeć</th>
                        <th>Status</th>
                        <th>Drużyna</th>
                        <th>Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <th class="scope-row"><?= $i ?></th>
                            <td><?= $row['FirstName'] ?></td>
                            <td><?= $row['LastName'] ?></td>
                            <td><?= $row['Class'] ?></td>
                            <td><?= $g = $row['Gender'] == "M" ? "Mężczyzna" : "Kobieta" ?></td>
                            <td><?= $st = $row['Status'] == "C" ? "Cywil" : "Wojskowy" ?></td>
                            <td><?= getTeamName($conn, $row['TeamID']) ?></td>
                            <td class="d-flex justify-content-around">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-contender_id="<?= $row['ID'] ?>"
                                        data-target="#ContenderCreationModal">
                                        <i class=" fa-solid fa-pen-to-square"></i>
                                    </button>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#ContenderDeletionModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                                <!-- <a class="text-danger" style="font-weight: bolder !important"
                                        href="logic/delete_contender.php?ID=<?php # $row['ID'] ?>"></a>
                                        actual deleting the user, change keyword php to '=' -->

                            </td>
                        </tr>
                        <?php $i++; ?>
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