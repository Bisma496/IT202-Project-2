# Moving On Up - IT 202 Project 2

Files for the Moving On Up representative website.

## Files
- `index.html`, `style.css`, `script.js`: login form and page design
- `login.php`, `logout.php`, `dashboard.php`: representative login and navigation
- `search_account.php`: search representative accounts
- `book_move.php`, `cancel_move.php`: manage moving events
- `special_instructions.php`, `update_instructions.php`: view and edit instructions
- `add_client.php`: add a client
- `database.sql`: database tables and sample data
- `export_csv.php`: export database tables as CSV
- `db_connect.php`, `common.php`: shared PHP code

## Running the project
1. Set up the tables in `database.sql` in the NJIT MySQL database. Only import the sample records once.
2. Configure the database password securely on the NJIT server. `db_connect.php` expects the `MOU_DB_PASSWORD` environment variable. Do not put the password in the repository.
3. Upload the site files to the `MOU_Project2` folder inside `public_html` using Cyberduck.
4. Open the site through the NJIT web server and test the login and six transactions.
5. Export the six tables to CSV after the database is working.
6. Submit the website link, GitHub repository link, code files, and CSV files in Canvas.

The database setup and live PHP pages still need to be tested on the NJIT server. Remove the connection test and CSV export scripts from the public site after using them.
