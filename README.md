# Library-Catalog
Hello there! If you're reading this, you are likely interested in learning how to install the software necessary to run this 
program. Assuming you have Windows 10, there are a couple things you have to do before running this program.

## Installing PHP
1. Download the PHP ZIP Package from [the PHP website.](https://windows.php.net/download) Download the PHP 7.2.5 VC15 x64 Non Thread Safe 
ZIP file. Be sure to virus scan the file for your safety.
2. Extract the files. Create a folder in your computer and extract the contents of the ZIP file into it. Of course
you can place the folder anywhere, but for this example, we will extract the ZIP contents to C:\php.
3. Add C:\php to the path environment variable. To ensure that Windows can find PHP, you need to change the path environment
variable. From the Control Panel, choose System, select the "Advanced" tab, and click the "Environment Variables" button.

Scroll down the System variables list and click on "Path" followed by the "Edit" button. Enter ";C:\php" to the end 
of the Variable value line (don't forget the semi-colon at the beginning).

4. Verify that everything is working. Open a command prompt, and type in "php -v". If you followed all the directions correctly, 
the command prompt should return the current installed version of PHP.

## Installing cURL
cURL is a program that is required to transfer client-side data through HTTP. Since our program is parsing online JSON data, we
will need to install cURL for our program to work properly.

