<?php
declare(strict_types=1);
use Session\Session;
use App\Models\Request;
use App\Models\Formalities;
session::init();


$runRequest = new Request();
$checkForm = new Formalities();
// // launch session in case it is not
// Session::init();
// //if user not connected redirect him to login page
// if(!Session::isConnect()) {
//     header('Location: index.php?url=login');
// }

// //mise en variable pour affichage html
// $firstName = htmlspecialchars(Session::get('First_Name'));
 $write =[];

if(isset($_GET['SearchBar'])&& !empty($_GET['SearchBar'])) {
   $SearchBar = $_GET['SearchBar'];
   $write = $runRequest->findByCategory($SearchBar);
   if(!$write && $SearchBar !== "Recents"){
        $noMatch = 'no match found';      
    } 
//     if(isset($_POST['deleteButton'])) {
//     $write = $runRequest->deleteAnimation();
//     }
}

// if(isset($_GET['Recents'])&& $_GET['Recents'] === "Recents") {
//     $write = $runRequest->findByDate();
// }
if(isset($_GET['SearchBar'])&& $_GET['SearchBar'] === "Recents") {
    $write = $runRequest->findByDate();
}

require_once '../Views/Main.phtml';