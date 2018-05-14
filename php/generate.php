<?php


$headers = array(
    "Content-type: application/json;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: \"run\""
); 

$isbns = array(
  "0906812976",
  "0688174841",
  "1582430578",
  "9781618420169"
);

function html_output($file, $code)
{
  fwrite($file, $code);
}

function decode_book_isbn($file, $headers, $isbn)
{
  $url = "https://openlibrary.org/api/books?bibkeys=ISBN:" . $isbn . "&jscmd=data&format=json";

  $cURL = curl_init();

  curl_setopt($cURL, CURLOPT_URL, $url);
  curl_setopt($cURL, CURLOPT_HTTPGET, true);
  curl_setopt($cURL, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($cURL);

  $json_data = json_decode($result, true);

  foreach ($json_data as $book) 
  {
      html_output($file, "-----------------------------------------<br/>\n");
      html_output($file, "ISBN: " . $isbn . "<br/>\n");
      html_output($file, "Title: " . $book['title'] . "<br/>\n");
      html_output($file, "Author: " . $book['authors'][0]['name'] . "<br/>\n");
    }

  curl_close($cURL);
}


// Main body

$file = fopen("index.html", "w") or die("Unable to open file!");


html_output($file, "<!DOCTYPE html>\n");
html_output($file, "<html>\n");


foreach ($isbns as $isbn)
{
  decode_book_isbn($file, $headers, $isbn);
}

html_output($file, "</body>\n");
html_output($file, "</html>\n");

fclose($file);

?>