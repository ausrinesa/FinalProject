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
    if (isset($_POST['edit'])) {
        $trip = TripContoller::show();
        $trips = TripContoller::index();
        $edit = true;
    }

    if (isset($_POST['update'])) {
        TripContoller::update();
        header("Location: ./index.php");
        die;
    }
    if (isset($_POST['destroy'])) {
        TripContoller::destroy();
        // ParticipantContoller::destroy();
        header("Location: ./index.php");
        die;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['filter'])) {
        $trips = TripContoller::filter();
    } else if (isset($_GET['filter']) == "") {
        $trips = TripContoller::index();
    } else if (isset($_GET['participants'])) {
        $participants = ParticipantContoller::index();
    } else if (isset($_GET['search'])) {
        $trips = TripContoller::search();
    }
    $participants = ParticipantContoller::index();
    $months = ParticipantContoller::showMonth();
}




?>