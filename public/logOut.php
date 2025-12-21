<?php

unset($_SESSION['isAdmin']);
unset($_SESSION['nick']);
session_destroy();
header('Location: /');