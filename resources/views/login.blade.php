<!-- The CSS and HTML5 free example has been taken from https://codepen.io/YinkaEnoch/pen/PxqrZV -->

<!DOCTYPE html>
<html lang="en">
	
<head>
	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pieslēgšana</title>

    @vite('resources/css/stylereg.css')
	
</head>
<body>

<div class="main-content">

    <div class="company__info">
        <img src = "{{ asset('images/logo-blue.png') }}" alt="Company Logo" >
    </div>

    <div class="login_form">

        <h3>Rēzeknes 3.pamatskolas inventāra uzskaites sistēma</h3>
		

        <form method="POST" action="/loginSubmit">

            @csrf

            <input type="text" name="login_name" class="form__input" placeholder="Lietotāja vārds">

            <input type="password" name="login_password" class="form__input" placeholder="Parole">

            <button type="submit" class="lbtn">Ieet</button>
        </form>

        <div class="register">
            <!-- Nav konta? <a href="/register">Registrēties šeit!</a> -->
        </div>

    </div>

</div>

</body>
</html>