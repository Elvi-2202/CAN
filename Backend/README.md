## Pour le Backend
cd backend
- composer install : pour installer les dependences
- symfony server:start ou  symfony server:start -d: pour lancer le serveur symfony
- php bin/console doctrine:database:create : pour la creation de la base de donnée
- php bin/console doctrine:migrations:migrate : Lancer les migrations :
- API disponible sur : http://localhost:8000