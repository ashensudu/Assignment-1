<!doctype html>
<html>
    <head>
         <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CSRF-STP</title>   
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <body style="background-image: url('images/profile1.jpg'); color: white; background-size: cover;">
        <?php 
            if(isset($_COOKIE['session_cookie'])){
                echo "
                <nav class='navbar navbar-dark bg-dark'>
                <a class='btn btn-success' href='logout.php' style='font-family:Georgia'>Logout</a>
                </nav>
             
                ";
            }
        ?>
        
        <?php
            
            if(isset($_COOKIE['session_cookie'])){
                
                echo "
				
                "
                . "<div class='container' style='margin-top: 100px'>
                    <div class='row justify-content-center'>
                    <div class='col-md-4 col-offset-3' align='center'>" 
                    .    "<form method='POST' action='submit.php'> "
                . "<!--CSRF token-->"
                        . "<input type='hidden' name='CSRF_token' id='CSRF_token' value=''>"
                        . "<input type='text' id='name' name='name' placeholder='Name' class='form-control'></br>"
                        . "<input type='text' id='itnumber' name='itnumber' placeholder='IT Number' class='form-control'>"
                        . "Faculty:<select id='faculty' name='faculty' class='form-control'>
                            <option>Computing</option>
                            <option>Business</option>
                            <option>Engineering</option>
                        </select><br><br>"
                        . "<input type='submit' id='submit' name='submit' class='btn btn-info' value='Submit'><br>"
                        . "</form>"
                        . "</div></div></div>";
            }
        
        ?>
        
        <script>
            var request = "true";
            $.ajax({
                url:"CSRF.php",
                type:"POST",
                data:{request:request},
                dataType:"JSON",
                success: function(data) {
                    document.getElementById("CSRF_token").value = data.token;
                }

        
            })
        </script>
        
    </body>
</html>

