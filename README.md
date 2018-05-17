# Library-Catalog
Hello there! If you're reading this, you are likely interested in learning how to install the software necessary to run this 
program. Assuming you have Windows 10, there are a couple things you have to do before running this program.

# Installing Prerequisite Programs
Before running this program, there are a couple things you have to install beforehand. Provided below are the instructions to do
so. Note: this tutorial assumes that you have a fresh installation of Windows 10.

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
will need to install cURL for our program to work properly. The easiest way to install cURL on Windows 10 is to use a program
called Chocolatey to download and install the required files.

1. Install Chocolatey. Chocolatey is a package manager for Windows (similar to apt-get). It was designed to be a decentralized
framework for quickly installing applications and tools that you need. Installation instructions are provided on
[their website.](https://chocolatey.org/install)
2. Install cURL using Chocolatey. Once you have successfully installed Chocolatey, all you have to do is open a command prompt
and enter the following command: "choco install curl"
3. Verify that cURL is working. Open a command prompt, and type in "curl". If you followed all the directions correctly, the
command prompt should suggest that you type "curl --help" for further information.

## Running the program
1. Download the repository ZIP file. Extract the contents of the ZIP to a location that you can navigate to on command prompt.
2. Execute the program. 
