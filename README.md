# Disneyland Paris - Refonte web

## Sommaire 

- I. Présentation du projet
- II. Fonctionnalités
- III. Installation avec Docker
    - A. Prérequis
    - B. Récupération du projet
    - C. Lancement du projet
- IV. Installation sans Docker
    - A. Prérequis
    - B. Récupération du projet
    - C. Initialisation base de données
    - D. Lancement du projet
- V. Documentation technique
- VI. Crédits & remerciements

## I. Présentation du projet

Dans le cadre de notre module "Suivi de projet développement" de deuxième année d'études en informatique, nous avons décidé de nous mettre en situation, en travaillant sur une refonte du site web de Disneyland Paris.

Cette initiative nous permet de disposer d'une source quasi-illimitée de fonctionnalités et de travail, comme le site web est déjà très fourni : vitrine, hôtellerie, billeterie, ...

**Point d'attention**: Toutes les données présentes par défaut sur ce site web grâce aux fixtures de symfony sont des données regroupées du site, des plans et d'autres ressources publiques de Disney Enterprises, Inc. Bien que le site soit en français, le nom de certaines attractions/hôtels sont en anglais. Nous avons voulu respecter ce choix et le maintenir sur ce projet.

## II. Fonctionnalités



Nous n'avons malheureusement pas pu implémenter toutes les fonctionnalités du site web de Disneyland Paris par manque de temps, mais nous considérons que notre objectif sur ce projet était plutôt d'aller le plus loin possible, au vu de la quantité de fonctionnalités présentes sur le site actuel.

## III. Installation avec Docker

### A. Prérequis

Le projet nécessite une connexion internet pour être consultable correctement.

**Prérequis logiciels :**
- Docker
- Docker-compose

### B. Récupération du projet

Il suffit d'exécuter la commande suivante dans le dossier de votre choix :

```bash
git clone https://github.com/LukaGrc/DisneylandParis.git
```

### C. Lancement du projet

Pour lancer le projet, il suffit d'exécuter la commande

```bash
docker-compose up --build
```




## IV. Installation sans Docker

### A. Prérequis

Le projet nécessite une connexion internet pour être consultable correctement.

**Prérequis logiciels :**
- PHP (Version 8.1.9) [télécharger ici](https://www.php.net/downloads.php)
- Composer (Version 2.5.5) [télécharger ici](https://getcomposer.org/download/)
- Symfony CLI (Version 5.5.2) [télécharger ici](https://symfony.com/download)
- Git (Version 2.40.0) [télécharger ici](https://git-scm.com/downloads)

**Services annexes nécessaires :**
- Serveur MariaDB (en localhost:3307)

### B. Récupération du projet

Il suffit d'exécuter la commande suivante dans le dossier de votre choix :

```bash
git clone https://github.com/LukaGrc/DisneylandParis.git
```

### C. Initialisation base de données

Les identifiants d'accès à votre serveur MariaDB figurent dans le fichier `.env`. Les identifiant par défaut sont ceux définis par WAMP : `root` sans mot de passe.
 
**Il est nécessaire de mettre vos identifiants MariaDB avec le format suivant :**

```
DATABASE_URL="mysql://UTILISATEUR:MOT_DE_PASSE@127.0.0.1:3307/dlp?serverVersion=8&charset=utf8mb4"
```

Sur votre serveur MariaDB, il faut créer une base de données nommée `dlp`.

Rendez-vous maintenant avec un terminal dans le dossier du projet pour taper les commandes suivantes :

```bash
symfony console d:s:d --force
symfony console d:s:u --force
symfony console d:f:l # Puis écrire "yes" lorsque vous y êtes invités
```

La base de donnée est initialisée avec les données par défaut pour faire run le site web ! Bravo !

### D. Lancement du projet

Pour lancer le projet en environnement de dev, il suffit d'exécuter la commande

```bash
symfony server:start
```

## V. Documentation technique

**DISCLAIMER :** Le fichier `.env` a été push sur le répository public pour les biens de l'exercice, dans une optique de limiter les modification et actions nécessaires pour lancer l'app. **Il est évident que dans le cadre d'un vrai projet, il ne faut SURTOUT PAS push ce fichier**


## VI. Crédits & remerciements

Ce projet a été réalisé par Luka GARCIA & Maxence GILLES (Bachelor 2 - Classe B) dans le cadre de notre deuxième année d'études d'informatique chez Bordeaux YNOV Campus.

Tout le contenu utilisé, dont l'ensemble des textes, images, et vidéos qui ont été utilisés pour ce projet sont la propriété de Disney Enterprises, Inc. tel que mentionné dans leurs mentions légales. **Ce projet ne peut donc être publié et auquel cas, nous déclinons toute responsabilité sur ces agissements.** 

```
Les marques, logos et dessins figurant sur ce site sont la propriété de Disney Enterprises, Inc. Leur divulgation ne saurait en aucun cas être interprétée comme vous accordant quelque licence ou droit d'utilisation des dites marques et des éléments distinctifs protégés par le droit d'auteur. Ils ne peuvent donc être utilisés sous peine de contrefaçon.
```


Nos remerciements vont directement à Anthony, notre référent ainsi qu'à l'équipe des mentors pour leur accompagnement tout au long de ce projet.