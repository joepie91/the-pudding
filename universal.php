<?php
/* --------------------------------------------------------------------------- *
// In a word, if you want to add a script and not have to worry about library
\\ dependencies and whatnot, just include this script and everything will be 
// loaded: settings, DBs, functions, classes, etc.
* --------------------------------------------------------------------------- */

// PEAR: HTMLPurifier (see install.sh)
require_once "HTMLPurifier.auto.php";

// Let's load all of the libraries:
foreach(glob(__DIR__."/libraries/*") as $f) {
  require_once $f;
}

// Load all of the settings:
$settings = json_decode(file_get_contents(__DIR__.'/config/application.json'), true);

// Setup databases
$DB = new DB($settings['database']);

// Include the session fixation prevention script
require_once __DIR__."/session.php";