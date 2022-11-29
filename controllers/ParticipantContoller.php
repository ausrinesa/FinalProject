<?php

include "./models/Participant.php";
class ParticipantContoller
{

    public static function index()
    {
        $participants = Participant::all();
        return $participants;
    }

    public static function showMonth()
    {
        $months = Participant::getMonth();
        return $months;
    }

    public static function store()
    {
        Participant::create();
    }

// public static function destroy()
// {
//     Participant::destroy($_POST['id']);
// }



}