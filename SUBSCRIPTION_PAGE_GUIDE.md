# Guide de la Page d'Abonnement

## Vue d'ensemble

Une nouvelle page d'abonnement a été créée pour votre site WordPress. Cette page contient un formulaire d'abonnement complet avec validation des données et gestion des emails.

## Fichiers créés

1. **content-subscription.php** - Template de contenu pour la page d'abonnement
    - Formulaire d'abonnement avec champs pour : nom, email, téléphone, plan
    - Styles CSS intégrés
    - Validation JavaScript côté client
    - Soumission AJAX

2. **subscription-handler.php** - Gestionnaire des abonnements
    - Traitement des soumissions de formulaire
    - Validation des données
    - Création d'une table de base de données pour les abonnements
    - Envoi d'emails de confirmation
    - Notifications à l'administrateur

3. **page-subscription.php** - Template de page WordPress
    - Template personnalisé pour afficher la page d'abonnement

## Comment utiliser

### 1. Créer une nouvelle page WordPress

1. Accédez à votre tableau de bord WordPress
2. Allez dans Pages > Ajouter une nouvelle
3. Donnez un titre à la page (ex: "Abonnement")
4. Cliquez sur le menu déroulant "Modèle" dans la section "Page Attributes"
5. Sélectionnez **"Page d'Abonnement"**
6. Ajoutez du contenu dans l'éditeur principal (optionnel)
7. Publiez la page

### 2. Plans d'abonnement

Les plans d'abonnement disponibles dans le formulaire sont :

- **Plan Basique** - 9,99€/mois
- **Plan Pro** - 19,99€/mois
- **Plan Premium** - 29,99€/mois

Pour modifier ces plans, éditez le fichier `content-subscription.php` et modifiez la section HTML du select.

## Fonctionnalités

### Validation

- Validation côté client (JavaScript)
- Validation côté serveur (PHP)
- Vérification des emails en doublon
- Validation du format email

### Emails

- **Email de confirmation** envoyé au nouvel abonné
- **Notification d'administrateur** avec les détails de l'abonnement

### Sécurité

- Nonce WordPress pour prévention du CSRF
- Sanitisation des données
- Validation des entrées
- Vérification des adresses IP

### Base de données

Une table `wp_subscriptions` est créée automatiquement avec les colonnes suivantes :

- `id` - Identifiant unique
- `name` - Nom complet
- `email` - Adresse email (unique)
- `phone` - Numéro de téléphone
- `plan` - Plan d'abonnement
- `date` - Date d'abonnement
- `ip_address` - Adresse IP du client
- `status` - Statut de l'abonnement (active, cancelled, etc.)

## Personnalisation

### Modifier les styles

Les styles CSS pour le formulaire se trouvent à la fin du fichier `content-subscription.php`. Vous pouvez les modifier directement ou les ajouter à votre feuille de styles personnalisée.

### Modifier les textes

Tous les textes sont localisés avec `__()` et `_e()`. Vous pouvez les traduire ou les modifier dans vos fichiers de traduction ou directement dans le code.

### Ajouter des champs supplémentaires

Pour ajouter des champs au formulaire :

1. Éditez `content-subscription.php` et ajoutez un nouveau `<div class="form-group">`
2. Éditez `subscription-handler.php` pour traiter le nouveau champ

Exemple :

```html
<div class="form-group">
	<label for="subscriber-company"><?php _e( 'Entreprise', '_tw' ); ?></label>
	<input
		type="text"
		id="subscriber-company"
		name="subscriber_company"
		class="form-control"
		placeholder="<?php _e( 'Nom de votre entreprise', '_tw' ); ?>"
	/>
</div>
```

Puis dans `subscription-handler.php` :

```php
$company = isset( $_POST['subscriber_company'] ) ? sanitize_text_field( $_POST['subscriber_company'] ) : '';
```

## Accès aux données d'abonnement

Pour accéder à la table des abonnements en SQL :

```sql
SELECT * FROM wp_subscriptions;
```

Vous pouvez également créer un tableau d'administration pour gérer les abonnements en ajoutant une page d'admin personnalisée au functions.php.

## Dépannage

### Le formulaire n'envoie pas

1. Vérifiez que WordPress AJAX fonctionne
2. Vérifiez les logs d'erreur PHP
3. Assurez-vous que le fichier `subscription-handler.php` est correctement inclus

### Les emails ne sont pas envoyés

1. Vérifiez que votre serveur peut envoyer des emails
2. Vérifiez l'adresse email de l'administrateur dans les paramètres WordPress
3. Considérez l'installation d'un plugin comme WP Mail SMTP pour plus de fiabilité

### Les données ne sont pas sauvegardées

1. Vérifiez que la table WordPress est créée
2. Vérifiez les permissions de la base de données
3. Vérifiez les logs d'erreur WordPress
