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

    public static function getMonth()
    {
        $months = [];
        $db = new DB();
        $query = "SELECT DISTINCT `month` FROM `participants` LEFT JOIN `trips` on `participants`.`trip_id`= `trips`.`id`";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $months[] = $row['month'];
        }
        $db->conn->close();
        return $months;
    }

// public static function destroy($id)
// {
//     $db = new DB();
//     $stmt = $db->conn->prepare("DELETE  `participants`.`name`, `participants`.`surname`, `trips`.`month` FROM `participants` WHERE `participants`.`trip_id`= `trips`.`id`");
//     $stmt->bind_param("i", $_POST['id']);
//     $stmt->execute();

//     $stmt->close();
//     $db->conn->close();
// }



}

?>