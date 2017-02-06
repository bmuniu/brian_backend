<p>Simply Install XAMPP: use the link: https://www.apachefriends.org/download.html</p>
<p>Start Apache & Mysql from XAMPP</p>

<p>Once you are done, you simply need to import the database sql dump file into your phpmyadmin - 
the database name is "travel_tracking"</p>

<ul>
   <li>Create a database with the name "travel_tracking"</li>
   <li>Click "Import" and upload the sql dump file travel_tracking.sql<li>
   <li>git clone: "https://github.com/bmuniu/brian_backend.git"
   <li>Change the .env file to match your database details<li>
   <li>In the folder brian_travel/config/database.php change the database details as well<li>
   <li>Access the frontend by using http://localhost/brian_travel/public/</li>
</ul>

NB:// Follow the same procedure for the backed