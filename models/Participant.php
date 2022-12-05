<?php

class Participant
{
    public $id;
    public $name;
    public $surname;
    public $tripId;
    public $month;

    public function __construct($id = null, $name = null, $surname = null, $tripId = null, $month = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->tripId = $tripId;
        $this->month = $month;

    }

    public static function all()
    {
        $participants = [];
        $db = new DB();
        $query = 'SELECT `participants`.`id`,`participants`.`name`, `participants`.`surname`, `participants`.`trip_id`, `trips`.`month` FROM `participants` LEFT JOIN `trips` on `participants`.`trip_id`= `trips`.`id` ORDER BY  `trips`.`month` ';
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $participants[] = new Participant($row['id'], $row['name'], $row['surname'], $row['trip_id'], $row['month']);
        }
        $db->conn->close();
        return $participants;
    }

    public static function create()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `participants`( `name`, `surname`,`trip_id`) VALUES (?,?,?)");
        $stmt->bind_param("ssi", $_POST['name'], $_POST['surname'], $_POST['tripId']);
        $stmt->execute();
        $stmt->close();

        $db->conn->close();
    }

    public static function find($id)
    {
        $participant = new Participant();
        $db = new DB();
        $query = "SELECT * FROM `participants` where `id`=" . $id;
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $participant = new Participant($row['id'], $row['name'], $row['surname'], $row['month']);
        }
        $db->conn->close();
        return $participant;
    }

    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `participants` SET `name`= ? ,`surname`= ? ,`month`= ?  WHERE `id` = ?");
        $stmt->bind_param("ssii", $_POST['name'], $_POST['surname'], $_POST['month'], $_POST['id']);
        $stmt->execute();


        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `participants` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }
}

?>