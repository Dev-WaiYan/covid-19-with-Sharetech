<?php

// Set updated time info in json file.
$file = fopen("backend/json/api_updated_time.json", "w") or die("Unable to open file 02!");
$updated_time = time();
fwrite($file, $updated_time);
fclose($file);

// Update to the API.
include_once('covid_api/covid_api_cases_by_country.php');

?>