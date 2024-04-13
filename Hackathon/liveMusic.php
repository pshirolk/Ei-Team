<?php
include 'top.php';
?>
<main>
    <h1>Live Music Forum</h1>

    <section>
        <h2>Active Threads</h2>
        <p>
            Shown below are the active threads.  Feel free to jump in to any discussion or create a new thread in the New Thread page.  Just remember to be polite, kind, and helpful.  NEVER give out your personal information on this forum.  If you would like to contact someone on this forum please take your communications away from the website as soon as you have established a line of private communication.  
        </p>

    </section>

    <section>
        <h3>Posted Threads</h3>

<?php
$sql = 'SELECT fldTitle, fldBody, fldTopic FROM tblForumPost WHERE fldTopic = 2 OR fldTopic = 3';
$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();

foreach($records as $record) {

    
    print $record[0] . ": <br><br>";
    print $record[1] . " <br><br>";
    echo "______________________<br><br>";
}
?>
        
    </section>

    
    
</main>
<?php
include 'footer.php';
?>
