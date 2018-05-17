# Introduction
Hello! If you are reading this, you are likely interested in learning more about this program, learning how to run it yourself, or
maybe both! This program parses JSON data containing textbook information, and creates a javascript-enabled website which displays
some of the textbooks' details. This is accomplished by using the Open Library Books API to obtain textbook information in JSON format
from provided ISBNs. The program then parses the JSON data for the textbooks' titles, authors, excerpts, and image thumbnails. All this
information is then written to a javascript-enabled website for consolidated viewing.

All of this is accomplished using PHP, HTML, CSS, and Javascript. PHP is used to obtain the book information in JSON format, parse
that information, and write the output to HTML format. HTML, CSS, and Javascript is used to display the website content. Additionally,
jQuery is used for a plug-in called jCarousel. Open source jCarousel code is borrowed in order to display the website information in 
an image slider format.

# Installing Prerequisite Programs
Before running this program, there are a couple things you have to install beforehand. Provided below are the instructions to do
so. Note: this tutorial assumes that you have a fresh installation of Windows 10.

## Installing PHP
PHP is a server-side scripting language designed for web development. It is also used as a general-purpose programming language.
Because of its relative ease of use for the Open Library API, JSON parsing, and HTML writing, it was one of the best choices for this
project. Unfortunately, on Windows 10, PHP must be manually installed and configured before it can be used. Luckily, however, I will
outline how this can be accomplished.
1. Download the PHP ZIP Package from [the PHP website.](https://windows.php.net/download) Download the PHP 7.2.5 VC15 x64 Non Thread Safe 
ZIP file. Be sure to virus scan the file for your safety.
2. Extract the files. Create a folder in your computer and extract the contents of the ZIP file into it. Of course
you can place the folder anywhere, but for this example, we will extract the ZIP contents to **C:\php**.
3. Add **C:\php** to the path environment variable. To ensure that Windows can find PHP, you need to change the path environment
variable. From the Control Panel, choose System, select the "Advanced" tab, and click the "Environment Variables" button.
Scroll down the System variables list and click on "Path" followed by the "Edit" button. Enter "**;C:\php**" to the end 
of the Variable value line (don't forget the semi-colon at the beginning).

4. Verify that everything is working. Open a command prompt, and type in "**php -v**". If you followed all the directions correctly, 
the command prompt should return the current installed version of PHP.

## Installing cURL
cURL is a program that is required to transfer client-side data through HTTP. Since our program is parsing online JSON data, we
will need to install cURL for our program to work properly. The easiest way to install cURL on Windows 10 is to use a program
called Chocolatey to download and install the required files.

1. Install Chocolatey. Chocolatey is a package manager for Windows (similar to apt-get). It was designed to be a decentralized
framework for quickly installing applications and tools that you need. Installation instructions are provided on
[their website.](https://chocolatey.org/install)
2. Install cURL using Chocolatey. Once you have successfully installed Chocolatey, all you have to do is open a command prompt
and enter the following command: "choco install curl"
3. Verify that cURL is working. Open a command prompt, and type in "**curl**". If you followed all the directions correctly, the
command prompt should suggest that you type "curl --help" for further information.

## Running the program
1. Download the repository ZIP file. Extract the contents of the ZIP to a location that you can navigate to on command prompt.
2. Execute the program. Open the command prompt and use the cd command to navigate to the folder that contains generate.php.
Once you find the folder, enter the following command to execute the program: "**php .\generate.php**". The index.html file containing
the parsed JSON textbook details should be created in the same folder. You may delete the pre-existing html file before executing the
command to check that the code is properly creating an HTML file.

And there you have it! Have fun with the project, and feel free to modify it to your heart's content!
