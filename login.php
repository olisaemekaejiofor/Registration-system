<?php 
    session_start();
    require_once("connection.php") ;
?>
<!doctype html>
<html>
<head>
    <title>LOG IN</title>
<style>
a:focus, a:active {  text-decoration: none;  outline: none;  transition: all 300ms ease 0s;  -moz-transition: all 300ms ease 0s;  -webkit-transition: all 300ms ease 0s;  -o-transition: all 300ms ease 0s;  -ms-transition: all 300ms ease 0s; }
input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {  appearance: none !important;  -moz-appearance: none !important;  -webkit-appearance: none !important;  -o-appearance: none !important;  -ms-appearance: none !important;  margin: 0; }
a{text-decoration: none;  color: white; }
.already{ color: blue;}
img {  max-width: 100%;  height: auto; }
figure { margin: 0; }
p { margin-bottom: 0px; }
input:-webkit-autofill {  box-shadow: 0 0 0 30px white inset;  -moz-box-shadow: 0 0 0 30px white inset;  -webkit-box-shadow: 0 0 0 30px white inset;  -o-box-shadow: 0 0 0 30px white inset;  -ms-box-shadow: 0 0 0 30px white inset; }
h2 { line-height: 1.8;  margin: 0;  padding: 0;  font-weight: bold;  color: #222;  font-family: 'Comic Neue', cursive;  font-size: 20px;  margin-bottom: 30px;  text-transform: uppercase; }
h3 { font-weight: bold; color: #222; font-size: 15px; margin: 0px; margin-bottom: 35px; }
.clear { clear: both; }
body {  font-size: 13px;  line-height: 1.8;  color: #fff;  background-image: url("./images/body-bg.jpg");  background-repeat: no-repeat;  background-size: cover;  -moz-background-size: cover;  -webkit-background-size: cover;  -o-background-size: cover;  -ms-background-size: cover; background-position: center center;  font-weight: 400;  font-family: 'Comic Neue', cursive;  margin: 0px; }
.main {  padding: 60px 0;  position: relative; }
.container {  width: 586px;  background: #fff;  margin-left: 165px;  border-radius: 10px;  -moz-border-radius: 10px;  -webkit-border-radius: 10px;  -o-border-radius: 10px;  -ms-border-radius: 10px; }
.signup-form, .login-form { padding: 50px 60px 70px 60px; margin-top: 40px; }
input, select {  width: 100%;  display: block;  border: none;  border-bottom: 2px solid #ebebeb;  padding: 5px 0;  color: #222;  margin-bottom: 31px;  font-family: 'Comic Neue', cursive ; }
input:focus, select:focus {    color: #222;    border-bottom: 2px solid #4966b1; }
.label-agree-term { color: #999; }
.submit { margin-top: 10px; width: auto; background: #4966b1; color: #fff; padding: 16px 17px; font-size: 13px; border: none;  border-radius: 5px;  -moz-border-radius: 5px;  -webkit-border-radius: 5px;  -o-border-radius: 5px;  -ms-border-radius: 5px;  cursor: pointer;  box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7);  -moz-box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7); -webkit-box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7); -o-box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7);  -ms-box-shadow: 0px 1px 15px 0px rgba(73, 102, 177, 0.7); }
.submit:hover {    background: #3a518d; }
@media screen and (max-width: 1024px) {.container {margin: 0 auto; } }
@media screen and (max-width: 768px) {.container {width: calc( 100% - 30px);    max-width: 100%; } }
@media screen and (max-width: 480px) {.signup-form, .login-form {padding: 50px 30px 70px 30px; } }
</style>
</head>
<body>
<?php
    if (isset($_POST ['submit'] )) {
        $user_name = $_POST['user_name' ] ;
        $password = $_POST['password'] ;

        $q ='SELECT * FROM `user` where `user_name`  = "'.$user_name.'" and `password` ="'.$password.'" ' ;
        $r = mysqli_query($con, $q) ;
        if($r){
            if(mysqli_num_rows($r)>0){
                $_SESSION['user_name'] = $user_name;
                header("location: index.php");
            }else{
                echo 'your password and username do not match';
            }
        }else{
            //
            echo $q;
        }
    }
?>
 <div class="main-con">
            <div class="container">
            <form method="POST" class="signup-form">
                <h2>SIGN IN</h2>
                <div class="form-group">
                    <input type="text" name="user_name" placeholder="Enter Username"/>
                    <input type="password" name="password" placeholder="Enter Password"/>
                </div>
                <div class="form-submit">
                    <input class="submit" type="submit" name="submit" value="SIGN IN">
                </div>
            </form>
            </div>
        </div>
</body>
</html>