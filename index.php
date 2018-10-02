<?php

/**
 * This is the core file for the project, for now.
 * Using mixed commands, dir and ls, but targeted to linux users.
 * This too is something to be changed, see everything as WIP and attempts
 *  before any cleanup
 * 
 * @author PatricNox <eronoxsmail@gmail.com>
 */

    session_start();
    $root = getcwd();
    $exec = NULL;

    if (isset($_POST['query']) && $_POST['query'] == 'dev')
        unset($_SESSION['currentdir']);

    if (isset($_POST['query']))
    {
        include_once('commands/utility.php');
        if (isset($_SESSION['currentdir']))
            chdir($_SESSION['currentdir']);

        // Execute command, log it and move to root
        terminal_input($_POST['query'], $root);
    }

    ## Generate markup & style
    $output = fopen('logs.txt', 'w');
    include('./layout/markup.php');
