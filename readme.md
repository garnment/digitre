# Test technique weather dashboard

## Installation

1- Cloner les sources du projet en local :
<pre>git clone https://github.com/garnment/digitre.git</pre>

---
**Remarque importante !** 
Pour les utilisateurs de Windows, assurez-vous de cloner le projet dans le répertoire C:/users/nom_utilisateur pour pouvoir utiliser Docker plus facilement.
---

2- Se placer à la racine du répertoire `digitre` et lancer les commandes suivantes
**Pour les utilisateurs de Windows, utilisez le Docker Quickstart Terminal**
<pre>docker-compose down</pre> 
<pre>docker-compose up --force-recreate --build -d</pre>
pour stopper d'éventuels containers en cours et forcer leur re-création

3- Lancez ensuite les commandes suivantes pour initialiser la base de données
<pre>
docker exec -ti digitre_app_1 bash
php artisan migrate
php artisan db:seed
</pre>

3- Le projet est accessible à :
<pre>
`http://localhost` sous Linux
`http://168.168.99.100' = remplacer par l'ip de votre VM sous Windows
</pre>

5- Pour stopper les container, tapez 
<pre>docker-compose down</pre>
