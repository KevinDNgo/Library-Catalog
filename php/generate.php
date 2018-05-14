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

function decode_book_isbn($headers, $isbn)
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
      printf("-----------------------------------------\n");
      printf("ISBN: %s\n", $isbn);
      printf("Title: %s\n", $book['title']);
      printf("Author: %s\n\n", $book['authors'][0]['name']);
    }

  curl_close($cURL);
}

foreach ($isbns as $isbn)
{
  decode_book_isbn($headers, $isbn);
}

?>