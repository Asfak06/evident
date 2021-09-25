<p>The app is hosted here : <a href="http://evident-bd.herokuapp.com/">click</a> </p>

<p>API endpoints can be found in routes/api.php</p>

<p>To run the app locally from docker:
<ul>
	<li>clone the app</li>
	<li>cd to app root</li>
	<li>run docker-compose build</li>
	<li>run docker-compose up -d</li>
        <li>run docker-compose run app composer install</li>
</ul>
</p>

<p>To run the app locally , traditional way:
<ul>
	<li>clone the app</li>
	<li>cd to app root</li>
	<li>run composer install</li>
	<li>edit database credential in .env</li>
	<li>run php artisan migrate</li>
	<li>run php artisan serve</li>
</ul>
</p>

