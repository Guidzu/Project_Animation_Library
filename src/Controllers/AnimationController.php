<?php
declare(strict_types=1);
use App\Models\Request;
use Session\Session;

$runRequest = new Request();
session::init(); 

     if(isset($_POST['submit']) && !empty($_POST['name'] && $_POST['category'] && $_POST['gif'] && $_POST['html_content'] && $_POST['css_content']) ) {
         
      $name = $_POST['name'];
      $category = $_POST['category'];
      $gif = str_replace('gif','embed',$_POST['gif']);  
      $html_content = $_POST['html_content'];
      $css_content = $_POST['css_content'];
      $runRequest->insertAnimation($name, $category, $html_content, $css_content,  $gif);
      $animationSent = "Animation send successfully :-)";
     }
      if(isset($_POST['submit']) && empty($_POST['name'] && $_POST['category'] && $_POST['gif'] && $_POST['html_content'] && $_POST['css_content'])){
          $empty = "Missing one field or more";
      }
     
require_once '../Views/Animation.phtml';