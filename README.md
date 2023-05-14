# Disneyland Paris - Refonte web

## Sommaire 

- [I. Présentation du projet](#i-présentation-du-projet)
- [II. Fonctionnalités](#ii-fonctionnalités)
    - [A. Site web général & contenus](#a-site-web-général--contenus)
    - [B. Gestion des utilisateurs, connexion et inscription](#b-gestion-des-utilisateurs-connexion-et-inscription)
    - [C. Système de réservation hôtelière](#c-système-de-réservation-hôtelière)
    - [D. Système d'achat de tickets](#d-système-dachat-de-tickets)
    - [E. Panel administrateur](#e-panel-administrateur)
    - [F. Implémentation de fonctionnalités supplémentaires](#f-implémentation-de-fonctionnalités-supplémentaires)
- [III. Installation](#iii-installation)
    - [A. Prérequis](#a-prérequis)
    - [B. Récupération du projet](#b-récupération-du-projet)
    - [C. Lancement & Initialisation base de données](#c-lancement--initialisation-de-la-base-de-données)
    - [D. Lancement du projet](#d-lancement-du-projet)
- [V. Documentation technique](#v-documentation-technique)
    - [A. Disclaimer](#a-disclaimer)
    - [B. Administrateur par défaut](#b-administrateur-par-défaut)
- [VI. Crédits & remerciements](#vi-crédits--remerciements)

## I. Présentation du projet

Dans le cadre de notre module "Suivi de projet développement" de deuxième année d'études en informatique, nous avons décidé de nous mettre en situation, en travaillant sur une refonte du site web de Disneyland Paris.

Cette initiative nous permet de disposer d'une source quasi-illimitée de fonctionnalités et de travail, comme le site web est déjà très fourni : vitrine, hôtellerie, billeterie, ...

🪄 **Point d'attention**: Toutes les données présentes par défaut sur ce site web grâce aux fixtures de symfony sont des données regroupées du site, des plans et d'autres ressources publiques de Disney Enterprises, Inc. Bien que le site soit en français, le nom de certaines attractions/hôtels sont en anglais. Nous avons voulu respecter ce choix et le maintenir sur ce projet.

## II. Fonctionnalités

### A. Site web général & contenus

De nombreuses pages sont déjà disponibles sur le site. Vous disposez d'une page d'accueil, et de pages "sommaires + articles uniques" pour chacun des éléments suivants :

- Destinations
- Lands
- Catégories d'attractions
- Attractions
- Hôtels
- Restaurants

### B. Gestion des utilisateurs, connexion et inscription

Nous avons imaginé un tout nouveau système de comptes, votre compte Disney Rider : un compte qui est valable sur tous les sites de parcs disney du monde, afin de rassembler tous vos billets, réservations et pass annuels au même endroit, en unifiant vos identifiants de connexion. Cela permettrait aussi d'envisager à l'avenir des offre multi-resorts.

Il est donc possible de s'inscrire directement depuis le site (les utilisateurs sont uniques par leur e-mail), de se connecter, et d'accéder (selon nos rôles) à un panel de gestion administrative.

### C. Système de réservation hôtelière

Il est possible de réserver une/plusieurs nuit(s) dans l'un des nombreux hôtels disney. Cette fonctionnalité prend en compte les disponibilités des hôtels, et applique vos recherches en vous laissant de nombreux choix :

- Nombre de personnes (jusqu'à 8 personnes)
- Dates de d'arrivée et de départ (jusqu'à 5 jours d'affilée)
- Choix de l'hôtel
- Choix du type de chambre
- Choix de la formule (`Hôtel` ou `Hotel + Parc`)

Sans système de paiement, cette fonctionnalité ne peut encore être utilisée publiquement.

### D. Système d'achat de tickets

Les utilisateurs peuvent acheter des tickets directement depuis le site, toujours en choisissant d'après leurs critères :

- Nombre de parcs à visiter
- Nombre de jours de visites

Le système d'enregistrement et de réservation d'accès aux parcs ayant généré beaucoup de polémique depuis la pandémie de COVID-19, nous avons décidé de le retirer volontairement, et ainsi de proposer des `Billets liberté - non datés`.

Sans système de paiement, cette fonctionnalité ne peut encore être utilisée publiquement.

### E. Panel administrateur

Il est possible de modifier les images/textes/contenus affichés sur le site depuis un panel admin, accessible depuis l'espace Compte Disney Rider.

Les administrateurs peuvent aussi consulter les réservations/achats qui ont été effectués sur le site.

### F. Implémentation de fonctionnalités supplémentaires

Nous n'avons malheureusement pas pu implémenter toutes les fonctionnalités du site web de Disneyland Paris par manque de temps, mais nous considérons que notre objectif sur ce projet était plutôt d'aller le plus loin possible, au vu de la quantité de fonctionnalités présentes sur le site actuel.

Les prochains axes d'améliorations visés seraient les suivants : 

- Affichage des temps d'attractions
- Affichage des plannings & spectacles
- Réservations de tables en restaurants

## III. Installation

### A. Prérequis

⚠️ **Attention :** Le projet nécessite une connexion internet pour être consultable correctement.

**Prérequis logiciels :**
- PHP (Version 8.1.9) - [Télécharger ici](https://www.php.net/downloads.php)
- Composer (Version 2.5.5) - [Télécharger ici](https://getcomposer.org/download/)
- Symfony CLI (Version 5.5.2) - [Télécharger ici](https://symfony.com/download)
- Git (Version 2.40.0) - [Télécharger ici](https://git-scm.com/downloads)
- Docker - [Télécharger ici](https://docs.docker.com/get-docker/)
- Docker-compose - [Télécharger ici](https://docs.docker.com/compose/install/)

### B. Récupération du projet

Il suffit d'exécuter la commande suivante dans le dossier de votre choix :

```bash
git clone https://github.com/LukaGrc/DisneylandParis.git
```

💡**Petit tips :** Les prochaines commandes sont à effectuer à la racine du projet (donc dans le dossier qui vient d'être clone) ! Vous pouvez y accéder avec la commande suivante :

```bash
cd DisneylandParis
```

### C. Lancement & initialisation de la base de données

**Pour lancer la base de données**, il suffit d'exécuter la commande :

```bash
docker-compose up --build
```

**Pour initialiser la base de données**, il suffit de faire les commandes suivantes :

```bash
symfony console d:s:d --force
symfony console d:s:u --force
symfony console d:f:l -n
```

### D. Lancement du projet

Pour lancer le projet en environnement de dev, il suffit d'exécuter la commande :

```bash
symfony server:start
```

## V. Documentation technique

### A. Disclaimer

Le fichier `.env` a été push sur le répository public pour les biens de l'exercice, dans une optique de limiter les modification et actions nécessaires pour lancer l'app. **Il est évident que dans le cadre d'un vrai projet, il ne faut SURTOUT PAS push ce fichier**

### B. Administrateur par défaut

Un utilisateur administrateur est défini par défaut avec les identifiants suivants :

- Email : `admin@disneylandparis.com`
- Mot de passe : `admin123`


## VI. Crédits & remerciements

Ce projet a été réalisé par Luka GARCIA & Maxence GILLES (Bachelor 2 - Classe B) dans le cadre de notre deuxième année d'études d'informatique chez Bordeaux YNOV Campus.

⛔ **Attention :** Tout le contenu utilisé, dont l'ensemble des textes, images, et vidéos qui ont été utilisés pour ce projet sont la propriété de Disney Enterprises, Inc. tel que mentionné dans leurs mentions légales. **Ce projet ne peut donc être publié et auquel cas, nous déclinons toute responsabilité sur toute mise en ligne,** sauf sous accord écrit par Disney Enterprises, Inc.

```
Les marques, logos et dessins figurant sur ce site sont la propriété de Disney Enterprises, Inc. Leur divulgation ne saurait en aucun cas être interprétée comme vous accordant quelque licence ou droit d'utilisation des dites marques et des éléments distinctifs protégés par le droit d'auteur.
Ils ne peuvent donc être utilisés sous peine de contrefaçon.
```

Nos remerciements vont directement à Anthony, notre référent ainsi qu'à l'équipe des mentors pour leur accompagnement tout au long de ce projet.