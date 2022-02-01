<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, , maximum-scale=1">
    <meta name="description" content="Mon site e-commerce de vente de chaussure">
    <meta name="keywords" content="chaussure, e-commerce, vente, chausette">
    <meta name="author" content="Lory LÉTICÉE">
    <link rel="stylesheet" href="/../../style/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>
        Bienvenue - Accueil
    </title>
    <style>
        #form_controller {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
            flex: 1 auto;
        }
    </style>
</head>

<body>
    <header>
        <h1 id="title">Bibliothèque</h1>
        <nav id="nav">
            <a href="/" title="Voir les ..."><i class="far fa-newspaper fa-2x"></i></a>
            <a href="/" title="Ajouter un ..."><i class="fas fa-plus fa-2x"></i></a>
            <a href="/logout" title="Se déconnecter"><i class="fas fa-sign-out-alt fa-2x"></i></a>
            <span class="pseudo-blue"></span>
            
        </nav>
        
        <nav id="nav-mobile">
            <div class="menu-btn" title="Menu">
                <div class="menu-btn__burger"></div>
            </div>
            <div id="nav-mobile_item">
                <ul>
                    <li><a href="/" title="Voir les ..."><i class="far fa-newspaper fa-2x"></i></a></li>
                    <li><a href="/"><i class="far fa-newspaper fa-2x"></i></a></li>
                    <li><a href="/" title="Ajouter un ..."><i class="fas fa-plus fa-2x"></i></a></li>
                    <li><a href="">&nbsp;</a></li>
                    <li><a href="/logout" title="Se déconnecter"><i class="fas fa-sign-out-alt fa-2x"></i></a> &nbsp;&nbsp; <span class="pseudo-blue"><?= $_SESSION['Type'] ?></span></li>
                </ul>
            </div>
        </nav>
    </header>

    <script>
        const menuBtn = document.querySelector('.menu-btn');
        const navMobile = document.querySelector('#nav-mobile_item');
        let menuOpen = false;
        menuBtn.addEventListener('click', () => {
            if (!menuOpen) {
                openBurger()
            } else {
                closeBurger()
            }
        })

        function openBurger() {
            menuBtn.classList.add('open');
            navMobile.classList.add('open');
            menuOpen = true;
        }

        function closeBurger() {
            menuBtn.classList.remove('open');
            navMobile.classList.remove('open');
            menuOpen = false;
        }

        document.addEventListener('click', (e) => {
            if (e.target.classList[0] !== "menu-btn" && e.target.classList[0] !== "open" && e.target.classList[0] !== "menu-btn__burger") {
                closeBurger();
            }
        });
    </script>