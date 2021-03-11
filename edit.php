<?php
    require_once('./includes/load.php');

    if(isset($_GET['id'])) {

        if(intval(0) == null) {
            header("Location: index.php");
        } else {
            $pupils = $pupil->show($_GET["id"]);
            $showBiasOnID = $bais->show($_GET["id"]);
        }
    }
    
    if(isset($_POST['update'])) {
        $pupil->update($_POST, $_GET["id"]);
        $showBiasOnID = $bais->show($_GET["id"]);
    }

    $baisList = $bais->list();


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Учащиеся</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa!important;
        }
    </style>
</head>
<body>
    <?php require_once "includes/navbar.php"; ?>
    <div class="container my-5">
        
        <?php require('./includes/states.php'); ?>
        
        <form class="bg-white shadow-sm p-5" method="post">

            <h5 class="pb-4">Редактировать</h5>

            <p>
                <?php
                    echo "Текущий уклон класса - " . $showBiasOnID["name"];
                ?>
            </p>

            <div class="input-group mb-3">
                <span class="input-group-text">Ф.И.О.</span>
                <input type="text" class="form-control" name="p_name" value="<?php echo $pupils["p_name"]; ?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Полных лет</span>
                <input type="text" class="form-control" name="p_years" value="<?php echo $pupils["p_years"]; ?>">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Класс</span>
                <input type="text" class="form-control" name="p_class" value="<?php echo $pupils["p_class"]; ?>">
                <span class="input-group-text">Уклон</span>
                <select class="form-select" name="id_bias">

                    <option selected>Выбрать уклон класса</option>

                    <?php
                        while($row = $baisList->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["id"] . $row["name"]; ?></option>
                    <?php
                        }
                    ?>

                </select>
            </div>

            <button type="submit" class="btn btn-outline-dark rounded-0" name="update">Обновить</button>
        </form>

    </div>
</body>
</html>