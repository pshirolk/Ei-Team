<?php
include 'top.php';

$dataIsGood = true;
$errorMessage = '';
$message = '';
$email = '';
$name = '';
$terms = 0;
$trip = 0;

function verifyAlphaNum($testString) {
    // Check for letters, numbers and dash, period, space and single quote only.
    // added & ; and # as a single quote sanitized with html entities will have 
    // this in it bob's will be come bob's
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

function getData($field) {
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

print PHP_EOL . '<!--Starting Sanitization -->' . PHP_EOL;
$email = getData('txtEmail');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$name = getData('txtName');
$terms = getData('txtTerms');
$trip = getData('radTrip');


print PHP_EOL . '<!--Starting Validation -->' . PHP_EOL;

if($email == '') {
    $errorMessage .= '<p class="mistake">Please type your email address.</p>';
    $dataIsGood = false;
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessage .= '<p class="mistake">Please type your email address.</p>';
    $dataIsGood = false;
}

if($name == '') {
    $errorMessage .= '<p class="mistake">Please type a name.</p>';
    $dataIsGood = false;
}

if($terms == 0) {
    $errorMessage .= '<p class="mistake">Please accept our terms.</p>';
    $dataIsGood = false;
}

if($trip != "Definitely Trip" AND $trip != "Trip" AND $trip != "Unsure" AND $trip != "Not Trip" AND $trip != "Definitely Not Trip") {
    $errorMessage .= '<p class="mistake">Please tell us what you think of our website.</p>';
    $dataIsGood = false;
}



print PHP_EOL . '<!--Starting Saving -->' . PHP_EOL;
if($dataIsGood) {
    $sql = 'INSERT INTO tblForumPost(fldEmail, fldName, fldTerms, fldTopic, fldRating) VALUES (?, ?, ?, ?, ?)';
    $data = array($email, $name, $terms, $topic, $trip);

    try{
        $statement = $pdo->prepare($sql);
        if($statement->execute($data)) {
            $message .= '<h2>Thank you</h2>';
            $message .= '<p>Your information was successfully saved.</p>';
            $to = $email;
            $from = 'Recreational Forum <mhayes17@uvm.edu>';
            $subject = 'New Thread';

            $mailMessage = '<p style="font: 14pt serif;">Thank you for ';
            $mailMessage .= 'contributing to our thread.</p><p> Have a wonderful day<br>';
            $mailMessage .= '<span style="color: black; padding-left: 3em;">';
            $mailMessage .= 'Recreational Forum</span></p>';

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "FROM: " . $from . "\r\n";

            $mailSent = mail($to, $subject, $mailMessage, $headers);

            if ($mailSent) {
                print "<p>A copy has been emailed to you for your records.</p>";
                print $mailMessage;
            }
        } else {
            $message .= '<p>Record was NOT successfully saved.</p>';
        }

    } catch(PDOException $e) {
        $message .= '<p>Could not insert the record, please contact someone.</p>';
    }
    
}
?>
<main>
    <h1>Add to a thread.</h1>

    

    <section>
        <h2>Have anything to add?</h2>
<?php
print '<p>Post Array:</p><pre>';
print_r($_POST);
print '</pre>';
?>
        <form action="#" method="POST">

            <fieldset class="contact">
                <legend>Please enter your email</legend>
                <p>
                    <label class="required" for="txtEmail">Email</label>
                    <label for="txtEmail">Email here</label>
                    <input id="txtEmail" maxlength="30" name="txtEmail"
                    onfocus="this.select()" tabindex="305" type="text" value="<?php print $email; ?>" 
                    required>
                </p>
            </fieldset>

            <fieldset class="contact">
                <legend>Please enter your name</legend>
                <p>
                    <label class="required" for="txtEmail">Name</label>
                    <label for="txtName">Name here</label>
                    <input id="txtName" maxlength="30" name="txtName"
                    onfocus="this.select()" tabindex="305" type="text" value="<?php print $name; ?>" 
                    required>
                </p>
            </fieldset>

            <fieldset class="contact">
                <legend>Please verify you accept the terms and conditions of the trip</legend>
                <p>
                    <label class="required" for="txtTerms">Terms</label>
                    <label for="txtTerms">Terms here</label>
                    <input id="txtTerms" maxlength="200" name="txtTerms"
                    onfocus="this.select()" tabindex="305" type="text" value="<?php print $terms; ?>" 
                    required>
                </p>
            </fieldset>

            
            <fieldset class="radio">
                <legend>Did you enjoy our website?</legend>
                <p>
                    <input type="radio" id="radSugarbushTrip" name="radTrip" 
                    value="Sugarbush Trip" tabIndex="430" 
                    <?php if($trip == "Sugarbush Trip") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radSugarbushTrip">Sugarbush Ski Trip</label>
                </p>
                <p>
                    <input type="radio" id="radMtMasfieldTrip" name="radTrip" 
                    value="Mt.Mansfiled Trip" tabIndex="430" 
                    <?php if($trip == "Trip") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radMtMasfieldTrip">Mt. Mansfield Day Hike</label>
                </p>
                <p>
                    <input type="radio" id="radBoltonValleyTrip" name="radTrip" 
                    value="Bolton Valley Trip" tabIndex="430" 
                    <?php if($trip == "Bolton Valley Trip") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radBoltonValleyTrip">Bolton Valley Bike Park</label>
                </p>
            </fieldset>

            <fieldset class="listbox">
                <p>
                    <input type="Submit">
                </p>
            </fieldset>

        </form>
    </section>

    <section>
        <h2>Thank you</h2>
    </section>
    
</main>
<?php
include 'footer.php';
?>
