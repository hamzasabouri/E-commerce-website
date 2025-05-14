# 🛒 AJI CHRI

Ce projet est un site e-commerce de vêtements pour femmes, hommes et enfants, offrant :

- Une interface client pour la navigation, la recherche, l'inscription et la connexion.
- Une interface administrateur pour la gestion des clients, des produits et des achats.

## 🌐 Fonctionnalités

### Interface Client

- Parcourir les produits par catégorie (homme, femme, enfant).
- Rechercher des produits par nom ou description.
- S'inscrire et se connecter pour passer des commandes.
- Ajouter des produits au panier et finaliser les achats.

### Interface Administrateur

- Gérer les produits : ajouter, modifier, supprimer.
- Gérer les clients : visualiser, modifier, supprimer.
- Gérer les commandes : visualiser, modifier le statut.

## 🛠️ Technologies Utilisées

- **Frontend** : HTML, CSS, JavaScript
- **Backend** : PHP
- **Base de données** : MySQL
- **Autres** : SQL script pour la base de données (`ajichri.sql`)



## 🚀 Installation

1. **Cloner le dépôt :**

   ```bash
   git clone https://github.com/hamzasabouri/E-commerce-website.git
   ```
2. Importer la base de données :

- Créer une base de données MySQL nommée ajichri.

- Importer le fichier ajichri.sql dans la base de données.

3. Configurer la connexion à la base de données :

 - Modifier les paramètres de connexion dans $conn  :

```bash
$conn = mysqli_connect('localhost:3307', 'your_username', 'your_password', 'ajichri');

```
- Lancer le serveur local :

- Placer le projet dans le répertoire racine de votre serveur web (par exemple, htdocs pour XAMPP).

Accéder au site via 
```bash
http://localhost/E-commerce-website/.
```
