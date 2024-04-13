<?php
include 'top.php';

$dataIsGood = true;
$errorMessage = '';
$message = '';
$email = '';
$agree = '';
$jay = 0;
$smuggs = 0;
$bush = 0;
$stowe = 0;
$mad = 0;
$okemo = 0;
$kill = 0;
$bolton = 0;

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
$agree = getData('radAgree');
$jay = (int) getData('chkJay');
$smuggs = (int) getData('chkSmuggs');
$bush = (int) getData('chkBush');
$stowe = (int) getData('chkStowe');
$mad = (int) getData('chkMad');
$okemo = (int) getData('chkOkemo');
$kill = (int) getData('chkKill');
$bolton = (int) getData('chkBolton');

print PHP_EOL . '<!--Starting Validation -->' . PHP_EOL;

if($email == '') {
    $errorMessage .= '<p class="mistake">Please type your email address.</p>';
    $dataIsGood = false;
} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessage .= '<p class="mistake">Please type your email address.</p>';
    $dataIsGood = false;
}

if($agree != "Strongly Disagree" AND $agree != "Disagree" AND $agree != "Unsure" AND 
$agree != "Agree" AND $agree != "Strongly Agree") {
    $errorMessage .= '<p class="mistake">Please tell me how much you agree with my rankings.</p>';
    $dataIsGood = false;
}

$totalChecked = 0;

if ($jay != 1) $jay = 0;
$totalChecked += $jay;

if ($smuggs != 1) $smuggs = 0;
$totalChecked += $smuggs;

if ($bush != 1) $bush = 0;
$totalChecked += $bush;

if ($stowe != 1) $stowe = 0;
$totalChecked += $stowe;

if ($mad != 1) $mad = 0;
$totalChecked += $mad;

if ($okemo != 1) $okemo = 0;
$totalChecked += $okemo;

if ($kill != 1) $kill = 0;
$totalChecked += $kill;

if ($bolton != 1) $bolton = 0;
$totalChecked += $bolton;

if($totalChecked == 0) {
    $errorMessage = '<p class="mistake">Please choose at least one box.</p>';
    $dataIsGood = false;
}


print PHP_EOL . '<!--Starting Saving -->' . PHP_EOL;

if($dataIsGood) {
    $sql = 'INSERT INTO tblFavoriteMountains (fldEmail, fldJay, fldSmuggs, fldBush, fldStowe, fldMad, fldOkemo, fldKill, fldBolton, fldAgree) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

    $data = array($email, $jay, $smuggs, $bush, $stowe, $mad, $okemo, $kill, $bolton, $agree);

    try{
        $statement = $pdo->prepare($sql);
        if($statement->execute($data)) {
            $message .= '<h2>Thank you</h2>';
            $message .= '<p>Your information was successfully saved.</p>';
        } else {
            $message .= '<p>Record was NOT successfully saved.</p>';
        }

    } catch(PDOException $e) {
        $message .= '<p>Could not insert the record, please contact someone.</p>';
    }
}

?>
<main>
    <h1>Vermont's Resorts</h1>

    <section>

        <h2>Jay Peak</h2>
        <figure class = "rounded">
            <img class = "rounded" alt="Jay Peak" src="images/JayPeak.jpg" style="max-width: 100%;">
            <figcaption><cite><a href="https://www.powder.com/latitudes/where-to-stay-at-jay-peak/"
            target="_blank">Jay Peak On a Bluebird Day</a></cite></figcaption>
        </figure>

        <h2>Survey</h2>
        <p>I am wondering what you thought about my rankings.</p>
    </section>

    

    <section>
        <h2>Can you change my mind?</h2>
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
                    <label for="email">Email here</label>
                    <input id="txtEmail" maxlength="30" name="txtEmail"
                    onfocus="this.select()" tabindex="305" type="text" value="<?php print $email; ?>" 
                    required></textarea>
                </p>
            </fieldset>

            <fieldset class="checkbox">
                <legend>Favorite Mountains</legend>
                <p>
                    <input id="chkJay" name="chkJay" tableindex="120"
                    <?php if($jay) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkJay">Jay Peak</label>
                </p>
                <p>
                    <input id="chkSmuggs" name="chkSmuggs" tableindex="120"
                    <?php if($smuggs) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkSmuggs">Smuggler's Notch</label>
                </p>
                <p>
                    <input id="chkBush" name="chkBush" tableindex="120"
                    <?php if($bush) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkBush">Sugarbush</label>
                </p>
                <p>
                    <input id="chkStowe" name="chkStowe" tableindex="120"
                    <?php if($stowe) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkStowe">Stowe</label>
                </p>
                <p>
                    <input id="chkMad" name="chkMad" tableindex="120"
                    <?php if($mad) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkMad">Mad River Glen</label>
                </p>
                <p>
                    <input id="chkOkemo" name="chkOkemo" tableindex="120"
                    <?php if($okemo) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkOkemo">Okemo</label>
                </p>
                <p>
                    <input id="chkKill" name="chkKill" tableindex="120"
                    <?php if($kill) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkKill">Killington</label>
                </p>
                <p>
                    <input id="chkBolton" name="chkBolton" tableindex="120"
                    <?php if($bolton) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkBolton">Bolton Valley</label>
                </p>
            </fieldset>

            <fieldset class="radio">
                <legend>Did you agree with my thoughts?</legend>
                <p>
                    <input type="radio" id="radStronglyDisagree" name="radAgree" 
                    value="Strongly Disagree" tabIndex="430" 
                    <?php if($agree == "Strongly Disagree") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radStronglyDisagree">Strongly Disagree</label>
                </p>
                <p>
                    <input type="radio" id="radDisagree" name="radAgree" 
                    value="Disagree" tabIndex="430" 
                    <?php if($agree == "Disagree") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radDisagree">Disagree</label>
                </p>
                <p>
                    <input type="radio" id="radUnsure" name="radAgree" 
                    value="Unsure" tabIndex="430" 
                    <?php if($agree == "Unsure") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radUnsure">Unsure</label>
                </p>
                <p>
                    <input type="radio" id="radAgree" name="radAgree" 
                    value="Agree" tabIndex="430" 
                    <?php if($agree == "Agree") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radAgree">Agree</label>
                </p>
                <p>
                    <input type="radio" id="radStronglyAgree" name="radAgree" 
                    value="Strongly Agree" tabIndex="430" 
                    <?php if($agree == "Strongly Agree") print 'checked'; ?> 
                    required>
                    <label class="radio-field" for="radStronglyAgree">Strongly Agree</label>
                </p>
            </fieldset>

            <fieldset class="listbox">
                <p>
                    <input type="submit">
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