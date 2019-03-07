<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "recho.alp@gmail.com";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "
        <style>
        body{
            padding: 0;
            margin: 0;
            color: #fff;
            font-family: 'Mukta', sans-serif;
            font-weight: 400;
            background: linear-gradient(270deg, #00cc6a, #00cec9);
            background-size: 400% 400%;
            -webkit-animation: AnimationName 10s ease infinite;
            -moz-animation: AnimationName 10s ease infinite;
            animation: AnimationName 10s ease infinite;
        }
        
        @-webkit-keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }
            50% {
                background-position: 100% 50%
            }
            100% {
                background-position: 0% 50%
            }
        }
        
        @-moz-keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }
            50% {
                background-position: 100% 50%
            }
            100% {
                background-position: 0% 50%
            }
        }
        
        @keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }
            50% {
                background-position: 100% 50%
            }
            100% {
                background-position: 0% 50%
            }
        }
        
        section {
            display: grid;
            place-items: center;
        }
        
        h1 {
            font-size: 10em;
        }
        
        p {
            font-size: 2em;
            letter-spacing: 2px;
            line-height: 2px;
        }
        
        .btn {
            background: transparent;
            border: 1px solid white;
            color: white;
            margin-top: 20px;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .btn:hover {
            color: #00cec9;
            background: white;
        }
        </style>
        <body><section>
              <h1>Ooops!</h1>";
        echo "<p>Wat ben ik vergeten?</p>";
        echo "<span style='text-align:center;'>" . $error . "</span>";
        echo "<button class='btn' type='button' onclick='history.back()'>GA TERUG</button>";
        echo "</section></body>";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['person1']) ||
        !isset($_POST['person2']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $person1 = $_POST['person1']; // required
    $person2 = $_POST['person2']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$person1)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Contactpersoon: ".clean_string($person1)."\n";
    $email_message .= "2e Contactpersoon: ".clean_string($person2)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Thank you</title>
	<link href="https://fonts.googleapis.com/css?family=Mukta:200,400,800" rel="stylesheet">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
</head>


<style>
body{
	padding: 0;
	margin: 0;
	color: #fff;
    font-family: 'Mukta', sans-serif;
    font-weight: 400;
    background: linear-gradient(270deg, #00cc6a, #00cec9);
    background-size: 400% 400%;
    -webkit-animation: AnimationName 10s ease infinite;
    -moz-animation: AnimationName 10s ease infinite;
    animation: AnimationName 10s ease infinite;
}

@-webkit-keyframes AnimationName {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}

@-moz-keyframes AnimationName {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}

@keyframes AnimationName {
    0% {
        background-position: 0% 50%
    }
    50% {
        background-position: 100% 50%
    }
    100% {
        background-position: 0% 50%
    }
}

section {
	display: grid;
	place-items: center;
	text-align: center;
}

h1 {
	font-size: 10em;
	text-transform: uppercase;
}

.animated {
  animation-duration: 2.5s;
  animation-fill-mode: both;
  animation-iteration-count: infinite;
}

@keyframes pulse {
  0% {transform: scale(1);}
  50% {transform: scale(1.1);}
  100% {transform: scale(1);}
}
.pulse {
  animation-name: pulse;
  animation-duration: 1s;
}

div {
	margin-top: -50px;
}

p {
    font-size: 1em;
	letter-spacing: 2px;
	line-height: 20px;
}

.box {
	margin-top: -150px;
}

</style>
<body>
		<section>
		<h1>Thank you! <br><div class="animated pulse">&#9829;</div></h1>
		<div class="box">
		<p>Hierbij wil ik deze afspraak bevestigen en u hartelijk bedanken voor de uitnodiging.</p>
		<p>Ik verheug mij erop u in een persoonlijk gesprek te overtuigen van mijn geschiktheid voor de functie.</p><br>
		<p>Groeten Richard</p></div>
		</section>
		
</body>
</html>
 
<?php
 
}
?>