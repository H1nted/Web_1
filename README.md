************ README PROJET WEB **************

/!\ IMPORTANT

- dans le fichier includes/dbh.inc.php, changez les paramètres de bases de données
afin de la lier avec le site WEB.

- Veuillez verifier que toutes les contraintes des tableaux sont en mode "cascade" pour l'effacage
ou modification, sinon plusieurs fonctionnalité du sites ne peuvent pas marcher.

- J'ai changé manuellement le mode cascade sur php my admin mais il existe une façon d e rajouter une 
ligne de code dans la creation des tableaux pour rendre les contraintes en mode "cascade" sauf que je ne connais 
que sur le language oracle et pas sql.





- Le dossier "includes", contient tous les scripts qui sont en relation avec la base
de données, quels tableaux sont prix en compte, toutes les variables session etc..

- Les pages php sont assez descriptives, chaque page commence par un "include_once(header.php)"
pour garder le même style dans toutes les pages.

- Le fichier CSS contient plusieurs commentaires en arabes (pour mieux m'orienter) veuillez les ignorer

- J'ai rajouté une fonctionnalité où j'efface les covoiturages qui ont 0 places disponibles de la base
de donnée, vous pouvez essayer vous-même pour voir comment cela fonctionne
