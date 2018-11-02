<div class="container-fluid">
    <div class="row">
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Genres littéraires
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-item bookTypeRoman"> Roman</span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Roman historique</a>
                            <a class="dropdown-item" href="#">Roman d'amour</a>
                            <a class="dropdown-item" href="#">Roman historique</a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-item bookTypeRoman"> Roman d'aventures</span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Roman policier</a>
                            <a class="dropdown-item" href="#">Roman noir</a>
                            <a class="dropdown-item" href="#">Roman espionnage</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Développement Personnel</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Business</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Biographie</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Science-fiction</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Fantasy</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Fantastique</a>
                        </div>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Comment booker ?</a>
                    </li>
                    <li>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Un livre spécifique ?" aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Rechercher</button>
                        </form>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-sm" id="loginBtnForm">Se connecter</a>
            </div>
        </nav>
    </div>
</div>
<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content col-sm-12">
            <div class="modal-header">
                <h4 class="modal-title text-left">Identifiez-vous</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="" action="index.html" method="post">
                    <i class="fas fa-user"></i><input id="usernameLogIn" class="ml-2" type="text" name="username" placeholder="Votre Identifiant" />
                    <div class="dropdown-divider"></div>
                    <i class="fas fa-lock-open"></i><input id="passwordLogIn" class="w-95 ml-1" type="password" name="password" placeholder="Mot de passe" />
                </form>
                <button id="confirmedButtonLogIn" class="btn btn-primary xs mt-4 ml-10" type="button" name="button">Valider</button>
                <div class="createAcc mt-5">
                    <a href="#">Inscrivez-vous ici</a>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgotPassword" id="forgotPassword">
                    <a href="#">Mot de passe oublié ?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar- bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genres littéraires</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
    </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Comment booker ?</a>
      </li>
    </ul>
  </div>
</nav>