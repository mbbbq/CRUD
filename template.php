<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css">
    <title>PHP-CRUD</title>
</head>
<body class="bg-secondary">
    <div class="container-fluid w-75">
        <div class="jumbotron mt-4">
            <div class="card">
                <div class="card-header bg-info text-light">
                    <h3>PHP-CRUD</h3>
            </div>
            <div class="card-body bg-light">
                <form class="form-inline" method="POST">
                    <input class="form-contorl m-2" type="text" name="first_name" placeholder="Vorname" value=<?= $first_name ?>>
                    <input class="form-contorl m-2" type="text" name="last_name" placeholder="Nachname" value=<?= $last_name ?>>
                    <input class="form-contorl m-2" type="number" name="age" placeholder="Alter" value=<?= $age ?>>
                    <input class="form-contorl m-2" type="text" name="gender" placeholder="Geschlecht" value=<?= $gender ?>>
                    <input class="form-contorl m-2" type="text" name="department" placeholder="Abteilung" value=<?= $department ?>>
                    <input type="hidden" name="ID" value=<?= $ID ?>>
                    <button type="submit" class="btn btn-info" name="button" value=<?= $save_update ?> <?= $save_update ?>></button>
                </form>
            </div>
        </div>
        <?php if ($info!=""):?>
        <div class="alert alert-<?=$alert_type?>" role="alert">
            <h5><?=$info?></h5>
        </div>
        <?php endif ?>
        <div class="card mt-4"></div>
            <div class="card-header bg-info">
                <form method="post">
                    <div class="input-group">
                        <input class="form-control" name="search" placeholder="search">
                        <button class="btn btn-info" name="button" value="search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-body overflow-auto">
                <table class="table table-striped">
                    <thead class="bg-info text-light">
                        <th>Vorname</th>
                        <th>Nachname</th>
                        <th>Alter</th>
                        <th>Geschlecht</th>
                        <th>Abteilung</th>
                        <th><?= $action ?></th>
                    </thead>
                    
                    <?php foreach($rows as $tr):?>
                    <tr>
                        <td><?=$tr['first_name']?></td>
                        <td><?=$tr['last_name']?></td>
                        <td><?=$tr['age']?></td>
                        <td><?=$tr['gender']?></td>
                        <td><?=$tr['department']?></td>
                        <td>

                            <form method="post" class="form-inline">
                                <input type="hidden" name="ID" value=<?=$tr['ID']?>>
                                <button class="btn btn-info" type="submit" value="edit" name="button">edit</button>
                                <button class="btn btn-danger ml-2" type="submit" value="delete" name="button">delete</button>
                            </form>
                        </td>
                    </tr>
                   <?php endforeach?>
                </table>
                <div class="alert alert-dark" role="alert">
                    <h5 class=" d-flex justify-content-end"><?=$info_DB?></h5>
                </div>
            </div>
    </div>
    
    
</body>
</html>