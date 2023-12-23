Projet SOA_SOUPUI
Ce projet est une démonstration d'une architecture orientée services (SOA) avec un service web simple en Java exposant des fonctionnalités bancaires de base. Le service web offre des opérations telles que la conversion de devises, l'ajout de comptes et la récupération de la liste des comptes.

Fonctionnalités
Conversion de devises : Le service web permet de convertir des montants de Dinars Tunisiens (DT) en Euros et vice versa.

Ajout de comptes : Il offre une méthode pour ajouter un nouveau compte avec un code et un solde spécifiés.

Liste des comptes : La méthode pour récupérer la liste de tous les comptes disponibles est également disponible.

Structure du projet
metier : Ce package contient la classe compte qui représente un compte bancaire avec des propriétés telles que le code, la date de création et le solde.

service : Le package contient la classe banqueService qui expose des méthodes de service web pour les fonctionnalités mentionnées ci-dessus.

serveur : Ce package contient la classe serceur qui publie le service web à une URL spécifiée.

client : Les exemples de clients en PHP et JavaScript qui consomment les services web.

Utilisation
Clonage du projet :

bash
Copy code
git clone https://github.com/mohamed-jilani/SOUP-Service-PHP-Client.git
Configuration : Assurez-vous d'avoir activé l'extension SOAP pour PHP et ajustez les URL du service web dans les clients PHP et JavaScript selon votre configuration.

Exécution : Exécutez le serveur Java, puis exécutez les clients PHP et JavaScript pour tester les fonctionnalités du service web.
