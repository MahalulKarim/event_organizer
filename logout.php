<?php
session_start();
session_destroy();
header('location:loginCustomer.php?pesan=logout');