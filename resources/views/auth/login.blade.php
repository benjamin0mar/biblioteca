
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de gestion BI</title>
<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
    $(".username").focus(function() {
        $(".user-icon").css("left","-48px");
    });
    $(".username").blur(function() {
        $(".user-icon").css("left","0px");
    });
    
    $(".password").focus(function() {
        $(".pass-icon").css("left","-48px");
    });
    $(".password").blur(function() {
        $(".pass-icon").css("left","0px");
    });
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">
    <div class="user-icon"></div>
    <div class="pass-icon"></div>

    <form class="login-form" method="POST" role="form" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="header" align="center">
            <h1>Business Intelligence <br /> "Biblioteca - FISS"</h1>
            <span>Login de ingreso para el personal, identifiquese con su  usuario y contraseña</span>
        </div>    
        <div class="content">
            <input name="email" type="text" class="input username" placeholder="Usuario()">
            
            <input name="password" type="password" class="input password" placeholder="Password()">
        </div>    
        <div class="footer">
            <input type="submit" id="submit" name="submit" value="Ingresar" class="button" />
    
        </div>    
    </form>
</div>
<div class="gradient"></div>
</body>
<script src="<?=URL::to('js/numeric.js'); ?>"></script> 
<script type="text/javascript">
    $(document).ready(function(){
        $('#dni').numeric();
    });
</script>
</html>