<?php
class Entry
{
    private $title;
    private $description;
    private $location;
    private $pay;

    function __construct($title, $description, $location, $pay)
    {
       $this->title = $title;
       $this->description = $description;
       $this->location = $location;
       $this->pay = $pay;
    }

    function setTitle($new_title)
    {
        $this->title = (string) $new_title;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setDescription($new_description)
    {
        $this->description = (string) $new_description;
    }

    function getDescription()
    {
        return $this->description;
    }

    function setLocation($new_location)
    {
        $this->location = (string) $new_location;
    }

    function getLocation()
    {
        return $this->location;
    }

    function setPay($new_pay)
    {
        $this->pay = (string) $new_pay;
    }

    function getPay()
    {
        return $this->pay;
    }

    function save()
    {
        array_push($_SESSION['entry_array'],$this);
    }

    static function getAll()
    {
        return $_SESSION['entry_array'];
    }

    static function clearAll()
    {
        $_SESSION['entry_array'] = array();
    }
}
?>
