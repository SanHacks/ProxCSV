# Random Name Generator for General Purpose 

![image](https://user-images.githubusercontent.com/13138647/222407563-c06841ce-94e8-46e3-97d6-9465fe5748b3.png)

## Description
This is a simple random name generator for general purpose. It can be used to generate random names for any purpose.

- Useful for generating random names for testing purposes.
- Useful for generating random names for your projects.
- Useful for generating random character names for your games.

## Achievements
 -[x] Create two arrays, one for names and one for surnames.
    - [x] 20 Names and 20 Surnames in each array.
    - [x] Number of variations of names and surnames.
   
      - [x] Create a `function to generate random names`.
      - [x] Create a `function to generate random surnames`.
      - [x] Create a `function to generate random full names`.
      - [x] Create a `function to generate random Id numbers`.
      - [x] Create a `function to generate random dates of birth`.
      
 - [x] `output folder`, the name of the file is  `output.csv`. 
 - [x] `Input field` that allows the user to enter the number of names to be generated.
 - [x] `Submit button` that allows the user to submit the number of names to be generated.
 - [ ] `NO DUPLICATE ROWS IN THE CSV FILE`
 - [x] `NO DUPLICATE ROWS IN THE DATABASE`
 - [x] Output a CSV file of `1 000 000 records`
 - [x] `Import the file` using a `form variable` of `file type`.
 - [x] Create DB Table

## Installation

1. **Clone** the repository or download the zip file.

    `git clone https://github.com/SanHacks/ProxCSV.git `
      
   See [GitHub Help](https://help.github.com/articles/cloning-a-repository/) for more information.


2. **Upload/Extract** the source to your server.(`XAMPP, WAMP, LAMP, MAMP, etc.`)
- If you are using XAMPP, copy the source to htdocs folder. `C:\xampp\htdocs`
- If you are using WAMP, copy the source to www folder. `C:\wamp\www`
- If you are using LAMP, copy the source to var/www/html folder.`C:\xampp\htdocs`
- If you are using MAMP, copy the source to htdocs folder. ` /Applications/MAMP/htdocs/`
- If you are using any other server, copy the source to the root folder.
  _(Assuming that the installer has already configured the server or a server)_

3. Create a database named "ProxServer" and import the PROJECT_DIR/`DB/generatedCSV.sql` file to the database.

   `CREATE TABLE IF NOT EXISTS ...`
- If you are using *AMP* Stack, you can import the sql file using phpmyadmin. (http://localhost/phpmyadmin)
- In PHPStorm, you can import the sql file using the following steps.
   - Open the sql file in the editor.
   - Click on the database name in the editor.
   - Click on the "Import" button.
   - Click on the "Go" button.
   - Through command line, you can import the sql file using the following command.
      - `mysql -u root -p 1234 < generatedCSV.sql`


4. Open the `PROJECT_DIR/index.php` file and change the database credentials in `getPDO()` function.
   - `$host = "localhost";`
   - `$user = "root";`
   - `$password = "";`
   - `$database = "ProxServer";`
   - `$port = "3306";`
   - `$charset = "utf8mb4";`
