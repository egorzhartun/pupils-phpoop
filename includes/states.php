<?php

    if(isset($_SESSION["sFalseCreate"])) { 

        printf('
            <div class="alert alert-info" role="alert">
                Запись успешно добавлена.
            </div>
        ');
        unset($_SESSION["sFalseCreate"]); 
    }

    if(isset($_SESSION["sNTrueCreate"])) { 

        printf('
            <div class="alert alert-danger" role="alert">
                Ошибка в графе «Ошибка в графе Ф.И.О.»
            </div>
        ');
        unset($_SESSION["sNTrueCreate"]); 
    }
    if(isset($_SESSION["sYTrueCreate"])) { 
        printf('
            <div class="alert alert-danger" role="alert">
                Ошибка в графе «Полных лет»
            </div>
        ');
        unset($_SESSION["sYTrueCreate"]); 
    }
    if(isset($_SESSION["sCTrueCreate"])) { 
        printf('
            <div class="alert alert-danger" role="alert">
                Ошибка в графе «Класс»
            </div>
        ');
        unset($_SESSION["sCTrueCreate"]); 
    }
    if(isset($_SESSION["sBTrueCreate"])) { 
        printf('
            <div class="alert alert-danger" role="alert">
                Ошибка в графе «Уклон»
            </div>
        ');
        unset($_SESSION["sBTrueCreate"]); 
    }

    if(isset($_SESSION["updateData"])) { 
        printf('
            <div class="alert alert-info" role="alert">
                Данные успешно обновлены.
            </div>
        ');
        unset($_SESSION["updateData"]); 
    }