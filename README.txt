Setting up and using the CRssFeed module with the Anax MVC framework
--------------------------------------------------------------------



1. Add dependency to "stjo15/c-rss-feed": "dev-master" to 'require' in your Anax-MVC composer.json file. 

2. In your bash command line, at your Anax-MVC folder, use the command 'composer install --no-dev'.
If you didn't install Composer yet, you should!

3. Add Anax-MVC/vendor/stjo15/c-rss-feed/app/config/mysql.php to your config folder. 
Insert SQL database your username, database name and password to the file.

4. Copy the c-rss-feed/app/view folder with contents to Anax-MVC/app/view/

5. Import sql-table/mvc_rssfeed.sql to your database.

6. Add the contents of c-rss-feed/webroot/config_with_app.php to Anax-MVC/webroot/config_with_app.php

7. Add the contents of src/db_di.txt to your DI (Dependency Injection) class to inject 'db' as dependency.

8. To test your installation, copy the test-controller webroot/rss.php to your Anax webroot and point your browser to it.
You might need to make corrections to the path variables or make hard links in order to make it work in your application.

9. Use the contents of webroot/examplecontent.php to customize your RSS feed. Read the instructions/documentation.

10. Your RSS content database should contain columns for pagekey, id, title and description. 
However, you can and should choose your own column names in the class RssFeed,
in the method getItems(). The xml tags should stay as they are, just change the contents of these tags.
For example, if you want to feed your new blog article, put $item['title'] as the content of tag <title>.

11. Important! In the RssFeed:getItems() method, set the variable $itemstable to the name of your content db table.

12. There are also functions to edit, delete and list RSS feeds. You should really check out the contents and customize it to your needs.