<?php
    $emailError="";
    $passwordError="";
    
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email)){
            $emailError = "<br/>Veuillez renseigner votre adresse e-mail";
        }else {
            $regex_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        
            if(!preg_match($regex_email, $email)) {
                $emailError = "<br/>Veuillez saisir une adresse e-mail valide";
            }
        }

        if(empty($password)){
            $passwordError = "<br/>Le mot de passe est requis";
        }else{
            if(strlen($password) <=8){
                $passwordError = "<br/>Le mot de passe doit contenir au moins 8 <br/>caractères";
            }elseif(!preg_match("#[A-Z]+#", $password)){
                $passwordError = "<br/>Le mot de passe doit contenir au moins une <br/>lettre majuscule";
            }elseif(!preg_match("#[a-z]+#", $password)){
                $passwordError = "<br/>Le mot de passe doit contenir au moins une <br/>lettre minuscule";
            }elseif(!preg_match("#[\d+]+#", $password)){
                $passwordError = "<br/>Le mot de passe doit contenir au moins un chiffre";
            }elseif(!preg_match("#[@$!%*?&]+#", $password)){
                $passwordError = "<br/>Le mot de passe doit contenir au moins un <br/>caractère spécial";
            }
        }
        if(empty($emailError) && empty($passwordError)) {
            header("Location: success.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
            <h2>Connectez-vous</h2>
        <div class="container_form">
            <form method="post">
                <div>
                    <input class="input-field" type="text" name="email" placeholder="Adresse e-mail" value="<?php if(isset($email)) { echo $email; } ?>"/>
                    <span class="error-message"><?php echo $emailError ?></span> 
                </div><br/>
                <div>
                    <input class="input-field" type="password" name="password" placeholder="Mot de passe"/>    
                    <span class="error-message"><?php echo $passwordError ?></span>
                </div>     
                <button name="submit">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>
