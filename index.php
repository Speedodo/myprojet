<html lang="eng" class="whole" >
    <head>
        <title>log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content =  "width = device-width,initial-scale 1.0">
        <link rel ="stylesheets" href="loginstyle.css">
    </head>
        <body class="bwhole">

        
       

        <form class="log" action="index.php" method="post">
            <h3 class="choice">SIGN UP</h3>
            <label for = "username" class="userin">username</label>
            <input type="text" class="userin" name="username" required><br>
            <label for = "password" class="userpas">Password</label>
            <input type="password"class="userpas" name="password"  required><br>
            <input type="submit" id="sighnup" value="sign up">
            <h3 id="warningreg"></h1>

            

           
        </form>
        <form class="log2" action="index.php" method="post">
        <h3 class="choice">LOG IN</h3>


            <label for = "username_login" class="userin" >username</label>
            <input type="text" class="userin"  name="username_login" required ><br>
            <label for = "password_login" class="userpas" >Password</label>
            <input type="password"class="userpas" name="password_login" required><br>
            <input type="submit" name="login_submit" id= "login"value="log in">
            <h3 id = "warninglog"></h1>
</form>


       
    </body>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .whole{
            width : 100vw;
            height: 100vh;
            background: linear-gradient(45deg,rgba(200,200,200,1),
                                                rgba(46, 79, 95, 1),
                                                rgba(56, 46, 146, 1));
                                                background-size: 200% 200%;
                                                animation: color 12s ease-in-out infinite;
                                        

        }

        @keyframes color{
            0%{
                background-position: 0 50%;
            }
              50%{
                background-position: 100% 50%;
            }
              100%{
                background-position: 0 50%;
            }
        }

        .log2{
            background-color: rgba(46, 79, 95, 0.5);
            width: 300px;
            height: 200px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
           
            
            border: solid black 2px;
            border-radius: 10px;
            box-shadow: 5px 5px 15px rgba(8, 1, 49, 1);
        }
          
        .log{
            
            background-color: rgba(46, 79, 95, 0.5);
            width: 300px;
            height: 200px;
            margin-left: auto;
            margin-right: auto;
           
            margin-top: 300px;
            border: solid black 2px;
            box-shadow: 5px 5px 15px rgba(8, 1, 49, 1);
            border-radius: 10px;
        }
        .choice{
            margin-left: 40%;
        }
        .userin{
            margin-top: 20px;
            
            margin-left: 15px;
            
        }
        .userpas{
            
            
            margin-left: 15px;
            
        }
        #sighnup{
            margin-left: 45%;
            margin-top:10px ;
        }
         #login{
            margin-left: 45%;
            margin-top:10px ;
        }
        #name{
            text-align: center;
        }
    </style>

    
</html>


<?php



include("database.php");

 



if($_SERVER["REQUEST_METHOD"]=="POST"){
     $user = filter_input(INPUT_POST,"username",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pass =$_POST["password"];

  

 


}




  $sql = "INSERT INTO users (username, password, register_date)
        VALUES (?, ?, CURRENT_TIMESTAMP())";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $user, $pass);


    try{
        mysqli_execute($stmt);
        
    }
    catch(mysqli_sql_exception){
        //echo "    have not entered input";
    }



    mysqli_stmt_close($stmt);


    if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["login_submit"])){
    $useru = filter_input(INPUT_POST,"username_login",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $userp = $_POST["password_login"];
    $sql = "SELECT * from users where username = ? and password = ?";
    $stmt = mysqli_prepare($conn,$sql);

    mysqli_stmt_bind_param($stmt,"ss",$useru,$userp);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if(mysqli_stmt_num_rows($stmt) == 1){
        
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $useru;
        header("location: cheese.html");
        exit;
        
    }else{
        echo "<script>alert('Login failed. Invalid username or password.')</script>";
    }
    mysqli_stmt_close($stmt);
    
   
}
    
mysqli_close($conn);

}
?>
