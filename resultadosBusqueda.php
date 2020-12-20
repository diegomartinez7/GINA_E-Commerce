<?php
// Array with names
$a[] = "Jersey";
$a[] = "Tenis";
$a[] = "Equipo";
$a[] = "Accesorios";
$a[] = "Ropa";


// get the q parameter from URL
$q = $_GET["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);  //Convert all characters to lowercase
  $len=strlen($q); 
  foreach($a as $name) {
       //stristr Find the first occurrence of una palabra inside de otra palabra, and return the rest of the string:
    if (stristr($q, substr($name, 0, $len))) {  //substr Extract parts of a string:
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "Sin resultados" : $hint;
?>