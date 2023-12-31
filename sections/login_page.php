

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/styles.css">
   <!-- custom font awesome file link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
   
<div class="login">
 <!-- <img src="assets/img/lgnback.png" alt="image" class="login__bg"> -->

   <img src="assets/img/school.jpg" alt="image" class="login__bg">

   <form action="" method="post" class="login__form">
      <h3 class="login__title">Login</h3>
      <i class="ri-mail-fill"></i>
      <div class="login__inputs">
         <div class="login__box">
         <input type="email" name="email" required placeholder="Email Adresse" class="login__input" style="color:#000;">
         </div>
         
         <div class="login__box">
         <input type="password" name="password" required placeholder="Password" class="login__input">
         <i class="ri-lock-2-fill"></i>
         </div>
      </div>
      <div class="login__check">
               <div class="login__check-box">
              
               </div>

      <input type="submit" name="submit" value="Login" class="login__button">
      <div class="login__register">
      </div>
   </form>

</div>

</body>
</html>