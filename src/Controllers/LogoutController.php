<?php
declare(strict_types=1);
use Session\Session;
session::init();
session::destroy();
header('Location: main?SearchBar=Recents');
?>