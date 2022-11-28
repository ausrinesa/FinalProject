<?php

include "./models/DB.php";

class Trip
{
    public $id;
    public $month;
    public $maxPeople;
    public $distance;
    public $withAnimals;
    public $registered;

    public function __construct($id = null, $month = null, $maxPeople = null, $distance = null, $withAnimals = null, $registered = null)
    {
        $this->id = $id;
        $this->month = $month;
        $this->maxPeople = $maxPeople;
        $this->distance = $distance;
        $this->withAnimals = $withAnimals;
        $this->registered = $registered;

    }

    public static function all()
    {
        $trips = [];
        $db = new DB();
        $query = 'SELECT `trips`.`id`, `trips`.`month`, `trips`.`max_people_allowed`, `trips`.`distance`, `trips`.`with_animals`, count(`participants`.`id`) as "registered" FROM `participants` right JOIN `trips` on `trips`.`id`= `participants`.`trip_id` group by `trips`.`id` ';
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $trips[] = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals'], $row['registered']);
        }
        $db->conn->close();
        return $trips;
    }

    public static function create()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `trips`(`month`, `max_people_allowed`, `distance`, `with_animals`) VALUES (?,?,?,?)");
        $stmt->bind_param("siii", $_POST['month'], $_POST['maxPeople'], $_POST['distance'], $_POST['withAnimals']);
        $stmt->execute();
        $stmt->close();

        $db->conn->close();
    }

    public static function find($id)
    {
        $trip = new Trip();
        $db = new DB();
        $query = "SELECT * FROM `trips` where `id`=" . $id;
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $trip = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals']);
        }
        $db->conn->close();
        return $trip;
    }

    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `trips` SET `month`= ? ,`max_people_allowed`= ? ,`distance`= ? ,`with_animals`= ? WHERE `id` = ?");
        $stmt->bind_param("siiii", $_POST['month'], $_POST['maxPeople'], $_POST['distance'], $_POST['withAnimals'], $_POST['id']);
        $stmt->execute();


        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `trips` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }


    public static function filter()
    {
        $trips = [];
        $db = new DB();
        $query = "SELECT * FROM `trips` ";
        $first = true;

        if ($_GET['withAnimals'] != "") {
            $query .= "WHERE `with_animals`=" . $_GET['withAnimals'];
            $first = false;

        }

        if ($_GET['peopleFrom'] != "") {
            $query .= (($first) ? "WHERE" : "AND") . " `max_people_allowed` >= " . $_GET['peopleFrom'] . " ";
            $first = false;
        }

        if ($_GET['peopleTo'] != "") {
            $query .= (($first) ? "WHERE" : "AND") . " `max_people_allowed` <= " . $_GET['peopleTo'] . " ";
            $first = false;
        }

        switch ($_GET['sort']) {
            case '1':
                $query .= " ORDER BY `distance`";
                break;

            case '2':
                $query .= " ORDER BY `distance` DESC";
                break;

        }

        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $trips[] = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals']);
        }
        $db->conn->close();
        return $trips;
    }

    public static function search()
    {
        $trips = [];
        $db = new DB();
        $query = "SELECT * FROM `trips` where `month` like \"%" . $_GET['search'] . "%\"";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $trips[] = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals']);
        }
        $db->conn->close();
        return $trips;
    }

}

?>