<?php

if (!isUserLoggedIn()) {
    header('Location: ' . appUrl());
    exit;
}

logoutUser();
header('Location: ' . appUrl('login?logout=1'));
exit;
