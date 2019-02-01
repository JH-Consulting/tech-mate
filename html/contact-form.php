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
      $to = "raistlen@gmail.com";
      $subject = "TECH-MATE query";
      $txt = "NAME:" . $_POST["name"] . "\r\n EMAIL: " . $_POST["email"] . "\r\n PHONE: " . $_POST["phone"]  . "\r\n MESSAGE: " . $_POST["message"];
      $headers = "From: " . $_POST["email"] . "\r\n";

      mail($to,$subject,$txt,$headers);
      echo "<div class=\"row align-items-center\">";
      echo "<div class=\"col-sm-4\"></div>";
      echo "<div class=\"col-sm-4 card-heading\">Thankyou for submitting a request</div>";
      echo "</div>";
      echo "<div class=\"row align-items-center\">";
      echo "<div class=\"col-sm-4\"></div>";
      echo "<div class=\"col-sm-4 card-heading\">We will get in contact very shortly.</div>";
      echo "</div>";
        $show_form=false;
    }
    else
    {
        echo "<div class=\"row align-items-center\">";
        echo "<div class=\"col-sm-4\"></div>";
        echo "<div class=\"col-sm-4 card-heading\"><B>Validation Errors:</B></div>";
        echo "</div>";
        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
          echo "<div class=\"row align-items-center\">";
          echo "<div class=\"col-sm-4\"></div>";
          echo "<div class=\"col-sm-4 card-heading\">$inpname : $inp_err</div>";
          echo "</div>";
        }
    }//else
}//if(isset($_POST['Submit']))

if(true == $show_form){
  ?>

<div class="row align-items-center">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div class="contact-form-heading">GET IN TOUCH</div>
    <form class="contact-form" method="post" action='' accept-charset='UTF-8'>
      <div class="form-row">
        <div class="form-group col-md-12">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
            </div>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
          </div>
        </div>
      </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-at"></i></div>
          </div>
          <input type="text" class="form-control" name="email" id="email" placeholder="Email">
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-phone"></i></div>
          </div>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12">
         <textarea class="form-control" name="message" id="message" placeholder="Message" rows="8"></textarea>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-12 text-center">
        <button type="submit" name="submitContactForm" value="submitContactForm" class="btn btn-primary mb-2 contact-form-btn">Submit</button>
      </div>
    </div>
  </form>
  </div>
  <div class="col-sm-4"></div>
</div>
<?PHP
}//true == $show_form
?>
