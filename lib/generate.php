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
      
      html_output($file, "<li>\n");
      html_output($file, "<img src=\"" . $book['cover']['large'] . "\" width=\"600\" height=\"400\" alt>\n");

      html_output($file, "<p>");
      html_output($file, "ISBN: " . $isbn . "<br/>\n");
      html_output($file, "Title: " . $book['title'] . "<br/>\n");
      html_output($file, "Author: " . $book['authors'][0]['name'] . "<br/>\n");
      html_output($file, "</p>");
      
      html_output($file, "</li>\n");
      
     }

  curl_close($cURL);
}


// Main body

$file = fopen("index.html", "w") or die("Unable to open file!");


html_output($file, "<!DOCTYPE html>\n");
html_output($file, "<html>\n");
html_output($file, "<head>\n");
html_output($file, "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/common_styles.css\">\n");
html_output($file, "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/mystyle.css\">\n");
html_output($file, "<script type=\"text/javascript\" src=\"js/jquery-3.3.1.min.js\"></script>\n");
html_output($file, "<script type=\"text/javascript\" src=\"js/jquery.jcarousel-core.min.js\"></script>\n");
html_output($file, "<script type=\"text/javascript\" src=\"js/myscripts.js\"></script>\n");
html_output($file, "</head>\n");
html_output($file, "<body>\n");

html_output($file, "<div class=\"wrapper\">\n");
html_output($file, "<h1>Library Book Catalog</h1>\n");
html_output($file, "<p>List of my popular books this year.</p>\n");

html_output($file, "<div class=\"jcarousel-wrapper\">\n");
html_output($file, "<div class=\"jcarousel\" data=jcarousel=\"true\">\n");
html_output($file, "<ul left: -3000px; top: 0px;>\n");

foreach ($isbns as $isbn)
{
  decode_book_isbn($file, $headers, $isbn);
}

html_output($file, "</ul>\n");
html_output($file, "</div>\n");

html_output($file, "<a href=\"#\" class=\"jcarousel-control-prev\" &lsaquo;</a>\n");
html_output($file, "<a href=\"#\" class=\"jcarousel-control-next\" &lsaquo;</a>\n");

html_output($file, "<p class=\"jcarousel-pagination\" data-jcarouselpagination=\"true\">\n");

foreach ($isbns as $isbn)
{
  if ($isbn == reset($isbns)) {
    html_output($file, "<a href=\"#" . $isbn . "class=\"active\">" . $isbn . "</a>\n");
  } else {
    html_output($file, "<a href=\"#" . $isbn . ">" . $isbn . "</a>\n");
  }
}

html_output($file, "</div>\n");
html_output($file, "</div>\n");
html_output($file, "</body>\n");
html_output($file, "</html>\n");

fclose($file);

?>