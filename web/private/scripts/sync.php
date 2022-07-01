<?php

echo "Quicksilver Debuging Output: SYNC ";
echo "\n\n";
echo "\n========= START PAYLOAD ===========\n";
 print_r($_POST);
echo "\n========== END PAYLOAD ============\n";

echo "\n------- START ENVIRONMENT ---------\n";
 $env = $_ENV;
 foreach ($env as $key => $value) {
   if (preg_match('#(PASSWORD|SALT|AUTH|SECURE|NONCE|LOGGED_IN)#', $key)) {
     $env[$key] = '[REDACTED]';
   }
 }
print_r($env);
echo "\n-------- END ENVIRONMENT ----------\n";

print("\n==== Drupal Environment importing database ====\n");
// Get paths for imports
$path  = $_SERVER['DOCUMENT_ROOT'] . '/private/data';

// Import database
echo ('Importing Database from ...');
echo "${path}/microsite-database.sql && drush cr";
// Please don't store your database in the repository. This is just for demo purposes.
$cmd = "drush sql:cli < ${path}/microsite-database.sql && drush cr";
passthru($cmd);
