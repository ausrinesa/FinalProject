<?php

include "./models/Participant.php";
class ParticipantContoller
{

    public static function index()
    {
        $participants = Participant::all();
        return $participants;
    }

    public static function store()
    {
        Participant::create();
    }

    public static function show()
    {
        $participant = Participant::find($_POST['id']);
        return $participant;
    }

    public static function update()
    {
        $participant = new Participant;
        $participant->id = $_POST['id'];
        $participant->name = $_POST['name'];
        $participant->surname = $_POST['surname'];
        $participant->tripId = $_POST['tripId'];
        $participant->update();
    }

    public static function destroy()
    {
        Participant::destroy($_POST['id']);
    }
}