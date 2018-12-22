<?php
require "init.php";
echo User::limit(5)->get();

//echo json_encode(['asd', 'asd', 'sdfdgdfgdfg']);