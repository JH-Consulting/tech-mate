<?php include 'header.php';?>
<?php
require_once "./scripts/php-form-validator/formvalidator.php";
$show_form=true;

if(isset($_POST['submitContactForm']))
{// The form is submitted

    //Setup Validations
    $validator = new FormValidator();
    $validator->addValidation("name","req","Please fill in Name");
    $validator->addValidation("email","email","The input for Email should be a valid email value");
    $validator->addValidation("email","req","Please fill in Email");
    //Now, validate the form
    if($validator->ValidateForm())
    {
        //Validation success.
        //Here we can proceed with processing the form
        //(like sending email, saving to Database etc)
        // In this example, we just display a message
        echo "<h2>Validation Success!</h2>";
        $show_form=false;
    }
    else
    {
        echo "<B>Validation Errors:</B>";

        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
            echo "<p>$inpname : $inp_err</p>\n";
        }
    }//else
}//if(isset($_POST['Submit']))

if(true == $show_form){
  
}
  ?>

<?php include 'footer.php';?>
