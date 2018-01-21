<?php

/**
 * Created by PhpStorm.
 * User: Maryam
 * Date: 1/22/2018
 * Time: 12:18 AM
 */
class validator
{
    private $errors = "";

    public function __construct()
    {
        $this->errors = "";
    }

    /**
     * @return string
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function chkUsername($username)
    {
        if ($username == "")
            $this->error("username can not be empty.");
        global $db;
        $count = $db->users->count(array("username" => $username));
        if ($count > 0)
            $this->error("duplicate username.");
        if (is_numeric($username))
            $this->error("username can not be a number!");
    }

    public function chkPassword($password)
    {
        if ($password == "")
            $this->error("password can not be empty.");
    }

    public function error($text)
    {
        $this->errors .= $text . "<br>";
    }

    public function getErrorHtml()
    {
        if ($this->errors != "")
            return '<div class="alert alert-danger alert-dismissable">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
            . $this->getErrors() .
            '</div>';
        else return "";
    }


}