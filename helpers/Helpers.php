<?php

class Helpers
{
    public static function deleteSession($session)
    {
        if (isset($_SESSION[$session])) {
            $_SESSION[$session] = null;
            unset($_SESSION[$session]);
        }

        return $session;
    }
}
