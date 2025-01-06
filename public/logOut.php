<?php

unset($_SESSION['logged-in']);
session_destroy();
header('Location: /');