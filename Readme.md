### GPR ENSP

<hr></hr>
<h3> Tasks:</h3>

- [X] Create the main pages and style them using the template given to u by Mr.Benoi.
* [X] Create the MVC structure using the method of linking in PHP.
* [X] Create a router to route to diffrent places.
* [X] Home Page
* [X] User profile
* [X] User search by name.
* [X] User search by index or id

* [X] add the history lf Emprent //TODAY

* [ ] Faire l'emrunt et le retourn par indice de materielle .
* [ ] Impliment the email sending possiblity
* [ ] Add the "Voir les reservation" page.
* [ ] Add the "Les retard" page.
* [ ] disconect
* [ ] Show all users
* [ ] create new user
* [ ] Ban a user
* [ ] the lot Creation page
* [ ] project creation page
* [ ] The gestion of metarial page
* [ ] gestion of lot oage
* [ ] Gestion of projects
* [ ] crete the "Reserver "page

- [ ] test
<h2>Difficulties </h2>
<hr>

<p>
1 - Creating the router was very hard because I needed to make links between the URI and the GET and POST methods and the array I created to make the link possible and easier to understand
</p>
<br>

<p>
2- Making the DB connection was hard because I had to use a new way to connect to the data base using a <span style="font-size:15px;color:green;">"Composer" </span> and library called <span style="font-size:15px;color:green;">"database" </span>, so learining about a new library and a new File manager and libraries in php was new but hard.
</p>
<br>
<p style="color:red;">

</p>
<h2>Qestions</h2>
    1- What is the email that will send the email to the user? <br>
    2- How to know if a material is already reserved by some one in the DB? <br>
    3- What is the diffrence between the `dispo` and `dispo_pret` in the DB?
    4- What is the process for implementing a history feature?
<hr>



<h2>Tools used</h2>
    1- MVC <br>
    2- Composer <br>
    3- DataBase in global scope <br>
    4- DataTables https://datatables.net/manual/installation <br>

<br>
<br>
<h2>C'est quoi le MVC</h2>
MVC est un acronyme pour "Modèle-Vue-Contrôleur" (ou "Model-View-Controller" en anglais). Il s'agit d'un pattern d'architecture logicielle couramment utilisé en développement web, et particulièrement en PHP.

L'architecture MVC consiste à séparer les différentes responsabilités de l'application en trois parties distinctes :

Le modèle (Model) : il représente les données de l'application et les traitements qui peuvent être appliqués sur ces données.

La vue (View) : elle représente la présentation visuelle de l'application, c'est-à-dire l'interface utilisateur (UI).

Le contrôleur (Controller) : il gère les interactions entre le modèle et la vue, c'est-à-dire qu'il récupère les données depuis le modèle, les traite si besoin, et les transmet à la vue pour qu'elle les affiche à l'utilisateur.

En utilisant l'architecture MVC, on peut séparer efficacement les différents aspects de l'application, ce qui rend le code plus facile à maintenir et à améliorer. Par exemple, si l'on souhaite changer la présentation visuelle de l'application, on peut le faire en modifiant uniquement la vue, sans toucher au modèle ou au contrôleur. De même, si l'on souhaite modifier le traitement des données, on peut le faire dans le modèle, sans toucher à la vue ou au contrôleur.

En PHP, il existe de nombreuses librairies et frameworks qui utilisent l'architecture MVC, tels que Laravel, Symfony, CodeIgniter, ou encore Yii.
<style>
    body{
        background:white;
    }
    h2{
        font-weight: bold;
    }
</style>
