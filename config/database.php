<?php

function dbConnect()
{
  $DB_DNS = 'mysql:host=localhost;dbname=beboom';
  $DB_USER = 'root';
  $DB_PASS = '';
  try {
    $database = new PDO($DB_DNS, $DB_USER, $DB_PASS);
  } catch (PDOException $th) {
    echo "Erreur " . $th->getMessage();
  }
  return $database;
}
