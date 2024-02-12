function showWelcomeMessage(role) {
    if (!localStorage.getItem('firstConnexion')) {
        if (role == 2) {
            alert(" ! IMPORTANT ! \n Bienvenue nouveau Quizzeur sur le site Quizzeo, \n \n Tu peux jouer aux quizs et en créer, gérer tes quizs, et accéder au classement des meilleurs joueurs. \n \n Bonne Chance ;) \n \n PS : Je t'invite fortement à consulte la page ABOUT ;-)");
        }
        else if (role == 3) {
           alert("! IMPORTANT ! \n Bienvenue nouveau Joueur sur le site Quizzeo, \n \n Tu peux jouer aux quizs des autres joueurs et accéder au classement des meilleurs joueurs. \n \n Bonne Chance ;) \n \n PS : Je t'invite fortement à consulte la page ABOUT ;-)");
        }
        
    }
    localStorage.setItem('firstConnexion', 'true');
}