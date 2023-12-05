<?php
// Create connection
$conn =  new PDO('mysql:host=localhost;dbname=web', "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
