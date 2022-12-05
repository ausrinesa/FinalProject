<?php
include "./controllers/TripController.php";
include "./controllers/ParticipantContoller.php";

$edit = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
        TripContoller::store();
        header("Location:./index.php");
        die;
    }

    if (isset($_POST['savePart'])) {
        ParticipantContoller::store();
        header("Location:./index.php");
        die;
    }

    if (isset($_POST['edit'])) {
        $participant = ParticipantContoller::show();
        $participants = ParticipantContoller::index();
        header("Location: ./register.php");
        $edit = true;
    }

    if (isset($_POST['update'])) {
        ParticipantContoller::update();
        header("Location: ./main.php");
        die;
    }
    if (isset($_POST['destroy'])) {
        ParticipantContoller::destroy();
        header("Location: ./main.php");
        die;
    }

    if (isset($_POST['savePar'])) {
        ParticipantContoller::store();
        header("Location: ./main.php");
        die;
    }
    $months = TripContoller::getMonth();

}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['filter'])) {
        $trips = TripContoller::filter();
    }
    if (isset($_GET['filter']) == "") {
        $trips = TripContoller::index();
    }
    if (isset($_GET['participants'])) {
        $participants = ParticipantContoller::index();
    }
    // if (isset($_GET['search'])) {
    //     $trips = TripContoller::search();
    // }
    $participants = ParticipantContoller::index();

}
?>