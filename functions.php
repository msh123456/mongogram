<?php
function isLogin()
{
    if (isset($_SESSION['username'])) return true;
    else return false;
}

function getUserInfo($username = "")
{
    global $db;

    if ($username == "" && isLogin())
        return $db->users->findOne(array("username" => $_SESSION['username']));
    else if ($username != "")
        return $db->users->find(array("username" => $username));
    else
        return null;
}
function protect($text){
    return htmlspecialchars($text,ENT_QUOTES);
}