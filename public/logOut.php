<?php

unset($_SESSION['logged-in']);
unset($_SESSION['nick']);
session_destroy();
header('Location: /');