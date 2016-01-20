<!DOCTYPE html>
<html>
     <?php 

        echo css_url('login'); 
        echo css_url('designComponent');
        echo js_url('jquery-2.min');
        //echo js_url('dataScript');

     ?> 
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

                    $login = array('name'=>'login','value'=> $id ,'placeholder'=>'Login', 'id' => 'login'); 

                ?>
                <span class="error"><strong> <?php echo $error; ?> </strong></span>
<!--                 <div data-error='<?php //echo $msg; ?>' class="summaryError">
                    <span class="textError"> <?php// echo $error; ?> </span>
                </div> -->
<!--                 <div data-error='' class="summaryError">
                    <span class="textError"> <?php //echo 'Login et/ou mot de passe incorrect'; ?> </span>
                </div> -->


                    <p> <?php echo form_input($login); ?> 
                    </p>

                    <?php 

                    $pass= array('name'=>'password','value'=>'','placeholder'=>'Password', 'id' => 'mdp'); ?>

                    <p> <?php echo form_password($pass);   ?> 
                    </p>

                    <?php

                    $checkbox = array('name'=>'remember_me','id'=>'remember_me'); ?>

                    <p class="submit"> <?php echo form_submit('commit','Login','class=submitForm'); ?> </p> <?php

                echo form_close(); /* Fin du formulaire */

                ?>

            </div>

            <div class="login-help">
              <p> Forgot your password? <a href="#"> Click here to reset it. </a> </p>
            </div>
        </section>
    </body>

</html>