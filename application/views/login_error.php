<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <section class="container">
                      
            <div class="login">

                <h1>LOGIN</h1>

                <?php /* construction du formulaire avec le helper form */ 

                    echo form_open('Identification/login');

                    $login = array('name'=>'login','value'=>'','placeholder'=>'Login ...'); 

                ?>

                    <p class="error"> <?php echo $error; ?> </p>


                    <p> <?php echo form_input($login); 

                              echo form_error('login'); ?> </p>

                    <?php 

                    $pass= array('name'=>'password','value'=>'','placeholder'=>'Password'); ?>

                    <p> <?php echo form_password($pass); 

                              echo form_error('mot de passe'); ?> </p>

                    <?php

                    $checkbox = array('name'=>'remember_me','id'=>'remember_me'); ?>

                    <p class="submit"> <?php echo form_submit('commit','Login'); ?> </p> <?php

                echo form_close(); /* Fin du formulaire */

                ?>

            </div>

            <div class="login-help">
              <p> Forgot your password? <a href="#"> Click here to reset it. </a> </p>
            </div>
        </section>
    </body>

    <?php 

        echo css_url('login'); 
        echo css_url('designComponent');

    ?> <!-- charger css formulaire de connexion -->
</html>