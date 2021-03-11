<?php
class Pupil {

    public $error = false;

    private $host;
    private $user;
    private $password;
    private $database;

    protected $connection;

    function __construct($host, $user, $password, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);

        if(!$this->connection) {
            throw new Exception('Ошибка!');
        }

    }

    function validName($pName) {
        if((strlen($pName) < 4) || (strlen($pName) > 50)){
            $this->error = true;
            $_SESSION["sNTrueCreate"] = true;
        }

        return $this->error;
    }

    function validYears($pYears) {
        if(($pYears < 6) || ($pYears > 18)) {
            $this->error = true;
            $_SESSION["sYTrueCreate"] = true;
        }

        return $this->error;
    }

    function validClass($pClass) {
        if(($pClass < 1) || ($pClass > 11)) {
            $this->error = true;
            $_SESSION["sCTrueCreate"] = true;
        }
    }

    function validIdBias($idBias) {
        if($idBias < 1) {
            $this->error = true;
            $_SESSION["sBTrueCreate"] = true;
        }
    }   

    function list() {
        $getAllPupils = $this->connection->query(
            "
            SELECT
                pupils.id,
                pupils.p_name,
                pupils.p_years,
                pupils.p_class,
                bias.name
            FROM pupils
            JOIN bias
                ON pupils.id_bias = bias.id
            ORDER BY pupils.id DESC
            "
        );
        return $getAllPupils;
    }

    function show($id) {
        $result = $this->connection->query("SELECT * FROM pupils WHERE id = '$id'");

        return $result->fetch_assoc();

    }

    function create($data = array()) {

        $pName = mysqli_real_escape_string($this->connection, htmlspecialchars($data["p_name"]));
        $pYears = mysqli_real_escape_string($this->connection, htmlspecialchars($data["p_years"]));
        $pClass = mysqli_real_escape_string($this->connection, htmlspecialchars($data["p_class"]));
        $idBias = mysqli_real_escape_string($this->connection, htmlspecialchars($data["id_bias"]));

        $this->validName($pName);
        $this->validYears($pYears);
        $this->validClass($pClass);
        $this->validIdBias($idBias);

        if(!$this->error) {
            $_SESSION["sFalseCreate"] = true;

            $result = $this->connection->query(
                "
                INSERT INTO pupils (p_name, p_years, p_class, id_bias)
                    VALUES ('$pName', '$pYears', '$pClass', '$idBias')
                "
            );
    
            if($result === true) {
                $_SESSION['pCreate'] = true;
            } else {
                return $this->connection->error;
            }

        }

    }

    function update($data = array(), $id) {

        $pName = mysqli_real_escape_string($this->connection, htmlspecialchars($data["p_name"]));
        $pYears = mysqli_real_escape_string($this->connection, htmlspecialchars($data["p_years"]));
        $pClass = mysqli_real_escape_string($this->connection, htmlspecialchars($data["p_class"]));
        $idBias = mysqli_real_escape_string($this->connection, htmlspecialchars($data["id_bias"]));

        $this->validName($pName);
        $this->validYears($pYears);
        $this->validClass($pClass);
        $this->validIdBias($idBias);

        if(!$this->error) {
            $setUpdate = $this->connection->query(
                "
                UPDATE pupils
                SET p_name = '$pName',
                    p_years = '$pYears',
                    p_class = '$pClass',
                    id_bias = '$idBias'
                WHERE id = '$id'
                "
            );

            if($setUpdate === true) {
                $_SESSION["updateData"] = true;
            } else {
                return $this->connection->error;
            }
        }

        return $this->pName;


    }

    function delete($id) {
        $pDelete = $this->connection->query("DELETE FROM pupils WHERE id = '$id'");
        if($pDelete === true) {
            header("Location: index.php");
        } else {
            return $this->connection->error;
        }

    }

    function __destruct()
    {
        $this->connection->close();
    }
}

class Bias extends Pupil {
    function list() {
        $getBias = $this->connection->query("SELECT * FROM bias");
        return $getBias;
    }
    
    function show($id) {
        $result = $this->connection->query(
            "
            SELECT
                bias.name
            FROM bias
            JOIN pupils
                ON bias.id = pupils.id_bias
            WHERE pupils.id = '$id'
            "
        );

        return $result->fetch_assoc();
    }

}