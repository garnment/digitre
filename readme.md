# Test technique weather dashboard

## Installation sous Linux :

1- Cloner les sources du projet en local :
<pre>git clone https://github.com/garnment/digitre.git</pre>


2- Se placer à la racine du répertoire `digitre` et lancer les commandes suivantes
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

5- Pour stopper les container, tapez 
<pre>docker-compose down</pre>


## Installation sous Windows :

1- Télécharger UwAmp à l'adresse suivante : 
https://www.uwamp.com/file/UwAmp.zip

2- Décompressez l'archive dans le répertoire de votre choix.

3- Cloner les sources du projet dans le répertoire `www` du dossier UwAmp que vous venez de décompresser.
<pre>git clone https://github.com/garnment/digitre.git</pre>

4- Editer le fichier de configuration Apache de votre répertoire UwAmp `\UwAmp\bin\apache\conf\httpd_uwamp.conf`et ajouter les lignes suivantes à la fin du fichier :
<pre>
<VirtualHost *:8080>
	DocumentRoot "{DOCUMENTPATH}/digitre/www/public/"
	<Directory "{DOCUMENTPATH}/digitre/www/public/">
		AllowOverride All
		Options FollowSymLinks Indexes 
		{ONLINE_MODE}		
	</ Directory>
</ VirtualHost>
</pre>

