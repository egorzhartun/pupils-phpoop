<?php
    require_once('./includes/load.php');

    $baisList = $bais->list();

    if(isset($_POST['create'])) {
        $pupil->create($_POST);

    }

?>
<!DOCTYPE html>
<html lang="ru">
    <?php require_once('./includes/head.php'); ?>
</head>
<body>
    <?php require_once('./includes/navbar.php'); ?>
    <div class="container my-5">
        
        <?php require('./includes/states.php'); ?>

        <form class="bg-white shadow-sm p-5" method="post">

            <h5 class="pb-4">Добавить ученика</h5>

            <div class="input-group mb-3">
                <span class="input-group-text">Ф.И.О.</span>
                <input type="text" class="form-control" name="p_name" placeholder="Пример: Котов А. В.">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Полных лет</span>
                <input type="text" class="form-control" name="p_years" placeholder="1-18">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Класс</span>
                <input type="text" class="form-control" name="p_class" placeholder="1-11">
                <span class="input-group-text">Уклон</span>
                <select class="form-select" name="id_bias">

                    <option selected>Выбрать уклон класса</option>

                    <?php
                        while($row = $baisList->fetch_assoc()) {  
                    ?>
                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                    <?php
                        }
                    ?>

                </select>
            </div>

            <button type="submit" class="btn btn-outline-dark rounded-0" name="create">Добавить</button>
        </form>

    </div>
</body>
</html>