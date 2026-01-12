<?php

unset($_SESSION['isAdmin']);
session_destroy();
header('Location: /');