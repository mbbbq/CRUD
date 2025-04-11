<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-CRUD</title>
    <style>
        body {
            background-color:rgb(161, 166, 172);      /* Sekundärfarbe (gray) */
            font-family: Arial, sans-serif;
            background-image: url('pexels-souvenirpixels-417074.jpg');       /* Pfad zum Bild */
            background-size: cover;                     /* Passt das Bild an den Bildschirm an */
            background-position: center;                /* Zentriert das Bild */
            background-repeat: no-repeat;               /* Kein Wiederholen des Bildes */
        }

        .container {
            width: 75%;
            margin: auto;
        }

        .jumbotron {
            background-color: #17a2b8;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .card {
            border-radius: 5px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #17a2b8;
            color: white;
            padding: 15px;
        }

        .card-body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-control {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .input-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .input-group .form-control {
            width: calc(100% - 80px); /* Reduziert die Breite für das Suchfeld */
        }

        .alert {
            padding: 10px;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table-striped tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            color: #333;    //ändert schriftfarbe!
        }

        .d-flex {
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="jumbotron mt-4">
        <div class="card">
            <div class="card-header">
                <h3>PHP-CRUD</h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input class="form-control m-2" type="text" name="first_name" placeholder="Vorname" value="<?= $first_name ?>">
                    <input class="form-control m-2" type="text" name="last_name" placeholder="Nachname" value="<?= $last_name ?>">
                    <input class="form-control m-2" type="number" name="age" placeholder="Alter" value="<?= $age ?>">
                    <input class="form-control m-2" type="text" name="gender" placeholder="Geschlecht" value="<?= $gender ?>">
                    <input class="form-control m-2" type="text" name="department" placeholder="Abteilung" value="<?= $department ?>">
                    <input type="hidden" name="ID" value="<?= $ID ?>">
                    <button type="submit" class="btn btn-info" name="button" value="<?= $save_update ?>"><?= $save_update ?></button>
                </form>
            </div>
        </div>

        <?php if ($info != ""): ?>
            <div class="alert alert-<?=$alert_type?>" role="alert">
                <h5><?= $info ?></h5>
            </div>
        <?php endif ?>

        <div class="card mt-4">
            <div class="card-header bg-info">
                <form method="post">
                    <div class="input-group">
                        <input class="form-control" name="search" placeholder="Search">
                        <button class="btn btn-info" name="button" value="search">
                            🔍
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
                    
                    <?php foreach($rows as $tr): ?>
                    <tr>
                        <td><?= $tr['first_name'] ?></td>
                        <td><?= $tr['last_name'] ?></td>
                        <td><?= $tr['age'] ?></td>
                        <td><?= $tr['gender'] ?></td>
                        <td><?= $tr['department'] ?></td>
                        <td>
                            <form method="post" class="form-inline">
                                <input type="hidden" name="ID" value="<?= $tr['ID'] ?>">
                                <button class="btn btn-info" type="submit" value="edit" name="button">Edit</button>
                                <button class="btn btn-danger ml-2" type="submit" value="delete" name="button">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
                <div class="alert alert-dark" role="alert">
                    <h5 class="d-flex justify-content-end"><?= $info_DB ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
