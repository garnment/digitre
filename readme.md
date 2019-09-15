# Test technique weather dashboard

## Sujet :
Weather Dashboard

Build a Weather Dashboard Web Application using the OpenWeatherMap API (http://www.openweathermap.com).

The App should have two pages:

The Home page, displaying the list of the user’s weather widgets.
Each widget displays at least the name of the city, the current temperature in Celsius and an icon of the weather (http://erikflowers.github.io/weather-icons/)

The Settings page, which purpose is to edit the content of the Home page.

The user can "Add" and "Remove" weather widgets.

You are free to increase the features, create the design, deploy the app, etc, but the use of PHP as main language is mandatory.

You must at least write the code and the technical documentation.


## Installation sous Linux :

1- Cloner les sources du projet en local :
<pre>git clone https://github.com/garnment/digitre.git</pre>


2- Se placer à la racine du répertoire `digitre` et lancer la commande suivante
<pre>docker-compose up -d</pre>

3- Lancez ensuite les commandes suivantes pour initialiser la base de données (uniquement au premier lancement)
<pre>
docker exec -ti digit-app bash
php artisan migrate
php artisan db:seed
</pre>
Pour relancer l'application après un `docker-compose down` il suffira simplement de lancer `docker-compose up -d`

4- Le projet est accessible à  :
<pre>
http://localhost
</pre>

5- Pour stopper les containers, tapez 
<pre>docker-compose down</pre>


## Installation sous Windows :

1- Télécharger UwAmp à l'adresse suivante : 
https://www.uwamp.com/file/UwAmp.zip

2- Décompressez l'archive dans le répertoire de votre choix.

3- Cloner les sources du projet dans le répertoire `www` du dossier UwAmp que vous venez de décompresser.
<pre>git clone https://github.com/garnment/digitre.git</pre>

4- Remplacer le répertoire `bin` de `UwAmp\bin` par le répertoire `bin` de `www\digitre\bin`.

5- Editez le fichier digitre\www\.env
et remplacez la constante `DB_HOST=database` par `DB_HOST=127.0.0.1`

5- Lancer `UwAmp.exe`

6- Dans une console, placez-vous dans `Uwamp/www/digitre/www` et lancez les commandes suivantes :
<pre>
php artisan database:create digitre
php artisan migrate
php artisan db:seed
</pre>

7- L'application est accessible à :
<pre>
http://localhost:8080
</pre>
