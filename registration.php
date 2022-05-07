<?php include('Userserver.php') ?>
<!DOCTYPE html>  
<html>  

<head>  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">  


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="registration.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>  




<body>  
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 text-left">
                <button href="myCart.html" class="btn btn-primary" type="submit">My cart: 0 items</button>
            </div>
            <div class="col-sm-3 text-right " style="font: size 16px;">
            
                <h2>Welcome, User!</h2>
            </div>
            <div class="col-sm-5         text-right">
                <button href="Sell.html" class="btn btn-primary" type="submit" href>Sell</button>
                <button href="Accounts.html" class="btn btn-primary" type="submit" href>My Account</button>
                <button href=" login.html"class="btn btn-primary" type="submit">Login</button>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center">
        <div class="row">
            <img src="" alt="website logo img-circle " class="text-right img-circle col-sm-2">
            <div class="col-sm-10 ">
            
                <h3>Online Buying and selling School Items System </h3>
            </div> */
            
                
           
        </div>
    </div>



<form> 
<form method="post" action="registration.php"></form>
    <?php include('errors.php'); ?> 
  <div class="container">  
    <h1> </h1>   
  <hr>

  <label> Firstname:</label>   
<input type="text" name="Firstname" value="<?php echo $Firstname; ?>"/>   



<label> Lastname: </label>    
<input type="text"name="Lastname" value="<?php echo $Lastname; ?>" /> 

<label>Date of Birth: </label>    
<input type="date"name="DateofBirth" value="<?php echo $DateofBirth; ?>" /> 


<label>   

Gender :  
</label><br>  
<label>
Male
</label>
<input type="radio" value="Male" name="Male" value="<?php echo $Male; ?>" >  
<label>
    Female
    </label>
<input type="radio" value="Female" name="Female" value="<?php echo $Female; ?>">   
<label>
    Other
    </label>
<input type="radio" value="Other" name="Other" >   
  



<label>   
Phone :  
</label>  
   
<input type="text" name="phone" value="<?php echo $phone; ?>" / required>   


<label>  
Current Address :  </label> 
<input type="text" name="Address" value="<?php echo $Address; ?>" / required>   



<label>   
    Card Number:  
    </label>   
 <input type="text"  name="cardNumber" value="<?php echo $cardNumber; ?>"/ required>  

 <label>   
    Expiry :  
    </label>  
 <input type="date"  name="date" value="<?php echo $date; ?>" >  

 <label>   
    Email :  
    </label>  
 <input type="text"  name="email" value="<?php echo $email; ?>"required>  
  
 <label>   
    password :  
    </label>   
    <input type="password"  name="password1" required>  
  
    <label>   
        Retype Password :  
        </label>   
    <input type="password"  name="password2" required>  

    <button type="submit" class="registerbtn">Register</button>    
    </div>
</form>  
</div>




</body>  
</html>  