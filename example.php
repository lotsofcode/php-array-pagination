<?php
  
    /************************************************************\
    *
    *	  PHP Array Pagination Copyright 2007 - Derek Harvey
    *	  www.lotsofcode.com
    *
    *	  This file is part of PHP Array Pagination .
    *
    *	  PHP Array Pagination is free software; you can redistribute it and/or modify
    *	  it under the terms of the GNU General Public License as published by
    *	  the Free Software Foundation; either version 2 of the License, or
    *	  (at your option) any later version.
    *
    *	  PHP Array Pagination is distributed in the hope that it will be useful,
    *	  but WITHOUT ANY WARRANTY; without even the implied warranty of
    *	  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	See the
    *	  GNU General Public License for more details.
    *
    *	  You should have received a copy of the GNU General Public License
    *	  along with PHP Array Pagination ; if not, write to the Free Software
    *	  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA	02111-1307	USA
    *
    \************************************************************/
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>PHP Array Pagination</title>
  <style>
  <!--
   body {
    font-family: Tahoma, Verdana, Arial, Sans-serif;
    font-size: 11px;
   }
   hr {
    border: 1px #ccc;
    border-style: none none solid none;
    margin: 20px 0;
   }
   a {
    color: #333;
    text-decoration: none;
   }
   a:hover {
    text-decoration: underline;
   }
   a.selected {
    font-weight: bold;
    text-decoration: underline;
   }
   .numbers {
    line-height: 20px;
    word-spacing: 4px;
   }
  //-->
  </style>
  </head>
  <body>
    <h1>PHP Array Pagination</h1>
    <hr  />
      <?php

        ini_set('display_errors','On');
        error_reporting(E_ALL);

        // Include the pagination class
        include 'pagination.class.php';
        
        // some example data
        foreach (range(1, 200) as $value) {
          $products[] = array(
            'Product' => 'Product '.$value,
            'Price' => rand(100, 1000),
          );
        }

        // If we have an array with items
        if (count($products)) {
          // Create the pagination object
          $pagination = new pagination($products, (isset($_GET['page']) ? $_GET['page'] : 1), 15);
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // You can overwrite the default seperator
          $pagination->setMainSeperator(' | ');
          // Parse through the pagination class
          $productPages = $pagination->getResults();
          // If we have items 
          if (count($productPages) != 0) {
            // Create the page numbers
            echo $pageNumbers = '<div class="numbers">'.$pagination->getLinks($_GET).'</div>';
            // Loop through all the items in the array
            foreach ($productPages as $productArray) {
              // Show the information about the item
              echo '<p><b>'.$productArray['Product'].'</b> &nbsp; &pound;'.$productArray['Price'].'</p>';
            }
            // print out the page numbers beneath the results
            echo $pageNumbers;
          }
        }
      ?>
      <hr />
      <p><a href="http://www.lotsofcode.com/php/projects/php-array-pagination" target="_blank">PHP Array Pagination</a> provided by <a href="http://www.lotsofcode.com/" target="_blank">Lots of Code</a></p>
  </body>
</html>