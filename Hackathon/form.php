<?php
include 'top.php';

$dataIsGood = true;
$errorMessage = '';
$message = '';
$email = '';
$title = '';
$body = 0;
$satisfied = 0;
$topic = 0;

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
$title = getData('txtTitle');
$body = getData('txtBody');
$satisfied = getData('radSatisfied');
$topic = getData('radTopic');


print PHP_EOL . '<!--Starting Validation -->' . PHP_EOL;

if($email == '') {
    $errorMessage .= '<p class="mistake">Please type your email address.</p>';
    $dataIsGood = false;
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessage .= '<p class="mistake">Please type your email address.</p>';
    $dataIsGood = false;
}

if($title == '') {
    $errorMessage .= '<p class="mistake">Please type a title.</p>';
    $dataIsGood = false;
}

if($body == '') {
    $errorMessage .= '<p class="mistake">Please type a body.</p>';
    $dataIsGood = false;
}

if($satisfied != "Definitely Satisfied" AND $satisfied != "Satisfied" AND $satisfied != "Unsure" AND $satisfied != "Not Satisfied" AND $satisfied != "Definitely Not Satisfied") {
    $errorMessage .= '<p class="mistake">Please tell us what you think of our website.</p>';
    $dataIsGood = false;
}

$totalChecked = 0;

if ($mountainBiking != 1) {$mountainBiking = 0;}
else {
    $totalChecked += $mountainBiking;
}

if ($skiing != 1) { $skiing = 0;}
else{
    $totalChecked += $skiing + 1;
}
if ($rockClimbing != 1) { $rockClimbing = 0;}
else{
    $totalChecked += $rockClimbing + 1;
}
if ($hiking != 1) { $hiking = 0;}
else{
    $totalChecked += $hiking + 1;
}

if($totalChecked == 0) {
    $errorMessage = '<p class="mistake">Please choose at least one box.</p>';
    $dataIsGood = false;
}


print PHP_EOL . '<!--Starting Saving -->' . PHP_EOL;
if($dataIsGood) {
    $sql = 'INSERT INTO tblForumPost(fldEmail, fldTitle, fldBody, fldTopic, fldRating) VALUES (?, ?, ?, ?, ?)';
    $data = array($email, $title, $body, $totalChecked, $satisfied);

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
                <legend>Please enter your title</legend>
                <p>
                    <label class="required" for="txtEmail">Title</label>
                    <label for="txtTitle">Title here</label>
                    <input id="txtTitle" maxlength="30" name="txtTitle"
                    onfocus="this.select()" tabindex="305" type="text" value="<?php print $title; ?>" 
                    required>
                </p>
            </fieldset>

            <fieldset class="contact">
                <legend>Please enter your body</legend>
                <p>
                    <label class="required" for="txtBody">Body</label>
                    <label for="txtBody">Body here</label>
                    <input id="txtBody" maxlength="200" name="txtBody"
                    onfocus="this.select()" tabindex="305" type="text" value="<?php print $body; ?>" 
                    required>
                </p>
            </fieldset>

            
            <fieldset class="radio">
                <legend>Please choose a Topic</legend>
                <p>
                    <input type="radio" id="radMountainBiking" name="radTopic" 
                    value="Mountain Biking" tabIndex="430" 
                    <?php if($topic == "Mountain Biking") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radMountainBiking">Mountain Biking</label>
                </p>
                <p>
                    <input type="radio" id="radSkiing" name="radTopic" 
                    value="Skiing" tabIndex="430" 
                    <?php if($topic == "Skiing") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radSkiing">Skiing</label>
                </p>
                <p>
                    <input type="radio" id="radHiking" name="radTopic" 
                    value="Hiking" tabIndex="430" 
                    <?php if($topic == "Hiking") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radHiking">Hiking</label>
                </p>
                <p>
                    <input type="radio" id="radRockClimbing" name="radTopic" 
                    value="Rock Climbing" tabIndex="430" 
                    <?php if($topic == "Rock Climbing") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radRockClimbing">Rock Climbing</label>
                </p>
            </fieldset>
            
            <fieldset class="radio">
                <legend>Did you enjoy our website?</legend>
                <p>
                    <input type="radio" id="radDefinitelySatisfied" name="radSatisfied" 
                    value="Definitely Satisfied" tabIndex="430" 
                    <?php if($satisfied == "Definitely Satisfied") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radDefinitelySatisfied">Definitely Satisfied</label>
                </p>
                <p>
                    <input type="radio" id="radSatisfied" name="radSatisfied" 
                    value="Satisfied" tabIndex="430" 
                    <?php if($satisfied == "Satisfied") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radSatisfied">Satisfied</label>
                </p>
                <p>
                    <input type="radio" id="radUnsure" name="radSatisfied" 
                    value="Unsure" tabIndex="430" 
                    <?php if($satisfied == "Unsure") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radUnsure">Unsure</label>
                </p>
                <p>
                    <input type="radio" id="radNotSatisfied" name="radSatisfied" 
                    value="Not Satisfied" tabIndex="430" 
                    <?php if($satisfied == "Not Satisfied") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radNotSatisfied">Not Satisfied</label>
                </p>
                <p>
                    <input type="radio" id="radDefinitelyNotSatisfied" name="radSatisfied" 
                    value="Definitely Not Satisfied" tabIndex="430" 
                    <?php if($satisfied == "Definitely Not Satisfied") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radDefinitelyNotSatisfied">Definitely Not Satisfied</label>
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
