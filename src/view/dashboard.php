
<main>
<?php 
switch ( session_status() == PHP_SESSION_ACTIVE)  {
        case ($_SESSION["role"]=="admin"):
            echo "  <form action='' method='post'><ul>
                    <li ><a class='nav-item' href='http://localhost/abiTest/test'><input type='submit' name='creer' class='nav-link'/></a>Créer un collaborateur</li>
                    <li class='nav-item'><a name='afficher' class='nav-link' href='http://localhost/abiTest/test'>Afficher tous les collaborateurs</a></li>
                    </ul></form>";
        break;
        
        }
?>

</main>