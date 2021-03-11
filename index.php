<?php
    require_once('./includes/load.php');
    $pupilsList = $pupil->list();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once('./includes/head.php'); ?>
</head>
<body>
    <?php require_once('includes/navbar.php'); ?>
    <div class="container my-5">

        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                <th scope="col">ИД</th>
                <th scope="col">Ф.И.О.</th>
                <th scope="col">Полных лет</th>
                <th scope="col">Класс</th>
                <th scope="col">Уклон класса</th>
                <th scope="col">Редактировать</th>
                </tr>
            </thead>
                
            <tbody>
                <?php
                    while ($row = $pupilsList->fetch_assoc()) {
                ?>
                <tr>
                    <th scope="row"><?php echo $row["id"]; ?></th>
                    <td><?php echo $row["p_name"]; ?></td>
                    <td><?php echo $row["p_years"] . " " . "лет"; ?></td>
                    <td><?php echo $row["p_class"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td>
                        <div class="btn-group btn-group-sm w-100" role="group">
                            <a href="<?php echo 'edit.php?id=' . $row["id"]; ?>" class="btn btn-outline-dark rounded-0">Редактировать</a>
                            <a href="<?php echo 'delete.php?id=' . $row["id"]; ?>" class="btn btn-outline-dark rounded-0">Удалить</a>
                        </div>

                    </td>
                </tr>
                <?php
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>