<?php
if(!empty($_POST)) {
    $values = $_POST;
    $form_has_error = false;
    $errors = array();

    if(isset($_POST['beef'])) {
        $values['beef'] = 1;
    } else {
        $values['beef'] = 0;
    }
    if(isset($_POST['pork'])) {
        $values['pork'] = 1;
    } else {
        $values['pork'] = 0;
    }
    if(isset($_POST['chicken'])) {
        $values['chicken'] = 1;
    } else {
        $values['chicken'] = 0;
    }
    if(isset($_POST['organic'])) {
        $values['organic'] = 1;
    } else {
        $values['organic'] = 0;
    }
    

    
    $farmInfoTwo = array(
        "chicken" => array(
            "name" => "chicken",
            "title" => "Chicken"
        ),
        "beef" => array(
            "name" => "beef",
            "title" => "Beef"
        ),
        "pork" => array(
            "name" => "pork",
            "title" => "Pork"
        ),
        "organic" => array(
            "name" => "organic",
            "title" => "Organic"
        )
    );

               
    foreach($values as $key => $value) {
        if(trim($value) == "") {
            $form_has_error = true;
            $errors[$key] = "Please enter the ".$key;
        }
    }
    
    if(!$form_has_error) {    
        $insert_id = insert('farms', $values);
    }
        
    if(isset($insert_id) && $insert_id) {
        //echo 'You have been signed up';
        header('Location: index.php?page=profile&id=' . $insert_id);
    } else {
        $error_message = "You could not be signed up";
    }
}
?>

<form class="form-vertical" action="index.php?page=signup" method ="post"
      style="padding-top:10px;">
    <div class="container-fluid">
        <?php if(isset($error_message)) : ?>
            <div class="row">
                <div class="span12">
                    <div class="alert alert-error">
                        <?php echo $error_message; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row" >
            <div class="span4 offset2">
                <fieldset>
                    <legend>Sign up here</legend>
                        <?php
                        $farmInfoOne = array(
                            "FarmName" => array(
                                "name" => "FarmName",
                                "title" => "Farm"
                            ),
                            "owner" => array(
                                "name" => "owner",
                                "title" => "Owner"
                            ),
                            "Address" => array(
                                "name" => "Address",
                                "title" => "Address"
                            ),
                            "csz" => array(
                                "name" => "csz",
                                "title" => "City/State/Zipcode"
                            ),         
                            "phone" => array(
                                "name" => "phone",
                                "title" => "Phone"
                            ), 
                            "email" => array(
                                "name" => "email",
                                "title" => "Email"
                            ),
                            "website" => array(
                                "name" => "website",
                                "title" => "Website"
                            )
                        );          
                        foreach ($farmInfoOne as $key => $nameTitle) { ?>
                            <div class="control-group">
                                <label class="control-label" for= <?php echo $nameTitle['name'] ?> >
                                    <?php echo $nameTitle['title'] ?> 
                                </label>
                                <div class="controls">
                                    <input id=<?php echo $nameTitle['name'] ?> type="text" name=<?php echo $nameTitle['name'] ?> >
                                </div>
                            </div>
                        <?php } ?>
                </fieldset>
            </div>
            <div class="span4">
                <fieldset>
                    <legend>Please check all that apply</legend>
                    
                    <?php 
                    $farmInfoTwo = array(
                        "chicken" => array(
                            "name" => "chicken",
                            "title" => "Chicken"
                        ),
                        "beef" => array(
                            "name" => "beef",
                            "title" => "Beef"
                        ),
                        "pork" => array(
                            "name" => "pork",
                            "title" => "Pork"
                        ),
                        "organic" => array(
                            "name" => "organic",
                            "title" => "Organic"
                        )
                    );
                    foreach ($farmInfoTwo as $key => $nameTitle) { ?>
                        <div class="control-group">
                            <div class="controls">
                                <label class="checkbox">
                                    <input type="checkbox" name=<?php echo $nameTitle['name'] ?> >
                                    <?php echo $nameTitle['title'] ?>
                                </label>
                            </div>
                        </div>
                    <?php } ?>
                </fieldset>

                <fieldset>
                    <legend>Add a description of your farm</legend>
                    <div class="control-group">
                        <div class="controls">                    
                            <textarea style="width:265px;"name="description" cols="350" rows="8"></textarea>
                            <p class="help-block">1000 characters max</p>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="span8 offset2">
                <div class="form-actions">
                    <input class="btn btn-inverse" type="submit" value = "Submit"/>
                </div>
            </div>
        </div>
    </div>
</form>