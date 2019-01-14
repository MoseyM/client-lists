<?php

/**
 * Retrieves the login form.
 * 
 * @return void
 */
function getLogin()
{
    include_once(PUBLIC_PATH.DIRECTORY_SEPARATOR."login.php");
}

/**
 * Returns the client list page.
 * 
 * @return void
 */
function getClientListPage()
{
    include_once(PUBLIC_PATH.DIRECTORY_SEPARATOR."client_list.php");
}