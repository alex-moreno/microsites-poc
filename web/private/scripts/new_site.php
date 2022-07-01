<?php
print("\n==== Drupal Environment importing database ====\n");
// Get paths for imports
$path  = $_SERVER['DOCUMENT_ROOT'] . '/private/data';

// Import database
echo ('Importing Database from ...');
echo "${path}/microsite-database.sql && drush cr";
// Please don't store your database in the repository. This is just for demo purposes.
$cmd = "drush sql:cli < ${path}/microsite-database.sql && drush cr";
passthru($cmd);
