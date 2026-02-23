# Team Registration Platform

Plateforme d'inscription d’équipes avec paiement en ligne.

Cette application permet :
- L’enregistrement d’une équipe
- L’ajout de 12 joueurs obligatoires
- L’acceptation du règlement
- Le paiement en ligne (CB / Stripe)
- La validation automatique de l’inscription après paiement

---

#  Stack Technique

## Frontend
- React
- Vite
- TypeScript
- Stripe JS

## Backend
- Symfony
- Doctrine ORM
- API REST
- Stripe Webhook

## Base de données
- MySQL (via XAMPP en local)

## Versioning
- GitHub (monorepo)
- Workflow : `main` + `develop`


#  Architecture du projet

my-project/
│
├── backend/ → API Symfony
├── frontend/ → Application React
├── docs/ → Documentation technique
│
├── .github/ → CI/CD
└── README.md

---

# Installation & Lancement du Projet

---

# Cloner le projet

```bash
git clone https://github.com/your-repo/CAN.git

```
## Pour le Back

* Prérecquis: 

PHP 8.1+

Composer

MySQL (XAMPP)

Symfony CLI (optionnel)

cd backend
- composer install : pour installer les dependences
- symfony server:start ou  symfony server:start -d: pour lancer le serveur symfony
- php bin/console doctrine:database:create : pour la creation de la base de donnée
- php bin/console doctrine:migrations:migrate : Lancer les migrations :
- API disponible sur : http://localhost:8000

## Pour le Frontend

Lancer le Frontend (React + Vite)
* Prérequis

- Node.js 18+

- npm ou yarn

* Installation:

- cd frontend
- npm install : installation des dependences
- npm run dev : Lancer le serveur
- Le front est dispopnible: http://localhost:5173
