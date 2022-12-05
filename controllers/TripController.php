<?php

include "./models/Trip.php";
class TripContoller
{

    public static function index()
    {
        $trips = Trip::all();
        return $trips;
    }

    public static function store()
    {
        Trip::create();
    }

    public static function show()
    {
        $trip = Trip::find($_POST['id']);
        return $trip;
    }

    public static function update()
    {
        $trip = new Trip;
        $trip->id = $_POST['id'];
        $trip->month = $_POST['month'];
        $trip->maxPeople = $_POST['maxPeople'];
        $trip->distance = $_POST['distance'];
        $trip->withAnimals = $_POST['withAnimals'];
        $trip->update();
    }

    public static function destroy()
    {
        Trip::destroy($_POST['id']);
    }

    public static function filter()
    {
        return Trip::filter();

    }

    // public static function search()
    // {
    //     return Trip::search();
    // }

    public static function getMonth()
    {
        return Trip::getMonth();
    }
    public static function showPar()
    {
        $tripPar = Trip::findPar($_GET['id']);
        return $tripPar;
    }

}