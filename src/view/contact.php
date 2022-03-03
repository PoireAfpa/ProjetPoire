<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link href="stylemail.css" rel="stylesheet" type="text/css">

    <title>Contact</title>

  

</head>
<body>
    <h4 class="sent-notification"></h4>
<form id="myForm">
<h1> Contact </h1>

<p>Pour toute demande, remplissez le formulaire ci-dessous.</p>

<form action ="mail.php" method="post" autocomplete="off">

    <label>Nom : </label>
    <input type="text" id="name"  >

    <label>Email : </label>
    <input type="email" id="email"  >

    <label>Sujet : </label>
    <input type="text" id="subject"  >

    <label>Message : </label>
    <textarea id="body"  required> </textarea>
    

    <input type="submit" value="Envoyer" name="Envoyer le message" onclick="sendEmail()" >
</form>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>

<script type="text/javascript">   
function sendEmail(){
    var name = $("#name");
    var email = $("#email");
    var subject = $("#subject");
    var body = $("#body");


    if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
        $.ajax({
            url: 'mail.php',
            method: 'POST',
            dataType: 'json',
            data:{
                name: name.val(),
                email: email.val(),
                subject: subject.val(),
                body: body.val()
            }, success: function(response){
                $('#myForm')[0].reset();
                $('sent-notification').text("Votre Message a bien été envoyé.");
            }
        });
    }
}

function isNotEmpty(caller){
    if(caller.val()==""){
        caller.css('border','1px solid red');
        return false;
    }
    else
    {
        caller.css('border','');
        return true;
    }
    }
    
    

</script>

</body>
</html>
