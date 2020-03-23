# Instructions
### 1. Create the database
In the root directory the file `example.sql` includes the sql to create the database. Note that I've included database creation command as well. It will create a new database `example`

### 2. Create the `config.ini` file
Create a new file `config.ini` and set the database DSN settings in there. I have included an example in config.ini.dist

*Notes*
- For apache, create a virtual host to land on /public directory
    ~~~
    <VirtualHost *:80>
        ServerName test.localhost
        DocumentRoot C:\xampp7\htdocs\example\public
    </VirtualHost>
    ~~~
- To change the language use the language switcher on the top right

