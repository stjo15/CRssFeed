Setting up and using the CRssFeed module with the Anax MVC framework
--------------------------------------------------------------------


1. Add the contents from CRssFeed/src/ to your Anax-MVC/src/ folder, put each class in the corresponding folder.  

2. Add the namespace 'Mos' in app/config/autoloader (see code in autoloader.txt) 

3. Add app/config/mysql.php to your config folder. Add your username, database name and password to the file.

4. Add the CRssFeed/app/view folder with contents to Anax-MVC/app/view/

5. Import sql-table/mvc_rssfeed.sql to your database.

6. Add the contents of webroot/config_with_app.php to Anax-MVC/webroot/config_with_app.php

7. Add the contents of src/db_di.txt to your DI (Dependency Injection) class to inject 'db' as dependency.

8. To test your installation, add the test-controller webroot/rss.php to your Anax webroot and point your browser to it.

9. Use the contents of webroot/examplecontent.php to customize your RSS feed.

10. Your RSS content database should contain columns for pagekey, id, title and description. However, you can and should choose your own column names in the class RssFeed,
in the method getItems(). 

11. There are also functions to edit, delete and list RSS feeds. You should really check out the contents and customize it to your needs.