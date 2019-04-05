<?php

require_once 'class/Helper.class.php';

Helper::sessionStart();
unset($_SESSION['user_id']);

header("Location: index.php");