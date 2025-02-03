# Page: insription (View)
1. Affichage: 
    input:  - text/ value = Nom name = nom
            - email/ value = Email name = email
            - password/ value = Password name = mdp
            - submit/ value = VALIDER
2. Data: TABLE elevage_Utilisateurs(id_Utilisateur,nom,email,motDePasse,capital)
3. Fonction
    Model:
        - addUser($nom,$mdp,$email)
    Controller:
        - afficherFormulaireInscription()
        - ajouterUser()
4. Integration:
    Route:
        - get('/',[inscriptionController, 'affichagerFormulaireInscription'])
        - post('/',[inscriptionController,'ajouterUser'])

# Page: Login (View)
1. Affichage:
    input:  - email/ value = Email name = email
            - password/ value = Password name = mdp
            - submit/ value = VALIDER
2. Data:  TABLE elevage_Utilisateurs(id_Utilisateur,nom,email,motDePasse,capital)
3. Fonction
    Model:
        - getUser($mdp,$email)
    Controller:
        - afficherFormulaireLogin()
        - checkLogin()  -> erreur
                        -> redirection(ajoutCapital)
                        -> SESSION['user']

4. Integration:
    Recuperation du variable $erreur
    Route:
        - get('/login',[loginController, 'affichagerFormulaireLogin'])
        - post('/login',[loginController, 'checkLogin'])

# Page: AjoutCapital (View)
1. Affichage:
    input:  - text/ value = Montant name = montant
            - submit/ value = VALIDER

2. Data: TABLE elevage_Utilisateurs(idUtilisateur,nom,email,motDePasse,capital) 

3. Fonction:
    Model:
        - addCapital($id,$montant)
    Controlleur:
        - afficherFormulaireAjoutCapital()
        - ajouterCapital()

4. Integration:
    Route:
        - Redirection ('listeAnimaux') SESSION['User']
        - get('/ajoutCapital',[ajoutCapitalController, 'affichagerFormulaireAjoutCapital'])
        - get('/ajoutCapital?action=ajouter',[ajoutCapitalController, 'ajoutCapital'])


# Page: ListeAnimaux(View)
1. Affichage:

2. Data:    TABLE elevage_Especes(idEspece,nomEspece)
            TABLE elevage_Animaux(idAnimaux,idEspece, nom, poidsMin, poidsMax, prixVente, nbjSManger, pertePoids, idUtilisateur)

3. Fonction:
    Model:
        - getAllAnimauxById($idUser)
    Controlleur:
        - listerAnimaux()

4. Integration:
    Route:
        - get('/achatAnimaux',[achatAnimauxController, 'handleRequest'])
        - get('/venteAnimaux',[venteAnimauxController, 'handleRequest'])
        - get('/achatAlimentation',[achatAlimentationController, 'handleRequest'])
        - get('/AjouterCapital',[ajouterCapitalController, 'updateCapital'])
        - get('/deconnexion',[Controller, 'seDeconnecter'])


# Page: AchatAnimaux (View)
1. Affichage:
2. Data:
3. Fonction:
4. Integration :

# Page: (View)
1. Affichage:
2. Data:
3. Fonction:
4. Integration :

# Page: (View)
1. Affichage:
2. Data:
3. Fonction:
4. Integration :


# Page: (View)
1. Affichage:
2. Data:
3. Fonction:
4. Integration :

# Page: (View)
1. Affichage:
2. Data:
3. Fonction:
4. Integration :

        