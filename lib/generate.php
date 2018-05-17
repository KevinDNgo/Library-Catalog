<?php

// Used to parse JSON data
$headers = array(
    "Content-type: application/json;charset=\"utf-8\"",
    "Accept: text/xml",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: \"run\""
); 

// Declare array of ISBNs
$isbns = array(
  "0906812976",
  "0688174841",
  "1582430578",
  "9781618420169",
  "0060786299",
"9780613581448",
"9782869781979",
"34521402",
"0393046559",
"9986140730",
"<script>alert('hello');</script>",
"0881847380",
"9782866652715"
);

// Used to write output to HTML file
function html_output($file, $code)
{
  fwrite($file, $code);
}

// Parses through ISBNs using Open Library API
function decode_book_isbn($file, $headers, $isbn)
{
  // Concatenates current ISBN into API URL
  $url = "https://openlibrary.org/api/books?bibkeys=ISBN:" . $isbn . "&jscmd=data&format=json";

  // Initializes cURL for API HTTP transfer
  $cURL = curl_init();

  curl_setopt($cURL, CURLOPT_URL, $url);
  curl_setopt($cURL, CURLOPT_HTTPGET, true);
  curl_setopt($cURL, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);

  // Stores result of cURL
  $result = curl_exec($cURL);

  // Stores decoded JSON data
  $json_data = json_decode($result, true);

  // Loops through each ISBN and outputs the book's ISBN, title, author, and excerpt
  // Also contains required HTML for each ISBN's output
  foreach ((array) $json_data as $book) 
  {  
      html_output($file, "<li>\n");
      html_output($file, "<img src=\"" . $book['cover']['large'] . "\" width=\"600\" height=\"400\" alt>\n");
      html_output($file, "<p>");
      html_output($file, "ISBN: " . $isbn . "<br/>\n");
      html_output($file, "Title: " . $book['title'] . "<br/>\n");
      html_output($file, "Author: " . $book['authors'][0]['name'] . "<br/>\n");
      if ($book['excerpts'][0]['text'] != '') 
      {
       html_output($file, "Excerpt: " . $book['excerpts'][0]['text'] . "<br/>\n");
      }
      else
      {
        html_output($file, "No excerpt found");
      }
      html_output($file, "</p>");
      html_output($file, "</li>\n");
     }

  curl_close($cURL);
}

// Main body

// Checks if HTML file can be opened, and if so, opens file for writing
$file = fopen("index.html", "w") or die("Unable to open file!");

// Outputs required HTML for document to function. Includes necessary CSS, JS, and JQuery calls
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

// Loops through each ISBN and calls function to decode them
foreach ($isbns as $isbn)
{
  decode_book_isbn($file, $headers, $isbn);
}

html_output($file, "</ul>\n");
html_output($file, "</div>\n");
// Displays left and right arrows to navigate through image slider
html_output($file, "<a href=\"#\" class=\"jcarousel-control-prev\" data-jcarouselcontrol=\"true\">&lsaquo;</a>\n");
html_output($file, "<a href=\"#\" class=\"jcarousel-control-next\" data-jcarouselcontrol=\"true\">&rsaquo;</a>\n");
html_output($file, "<p class=\"jcarousel-pagination\" data-jcarouselpagination=\"true\">\n");

// Loops through each ISBN and displays current book's image number
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