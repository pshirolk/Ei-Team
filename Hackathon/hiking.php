<?php
include 'top.php';
?>
<main>
    <h1>Hiking</h1>

    <section>
        <h3>Upcoming Events</h3>
  
    <section>
        <h3>Links</h3>
        <p>
            <a href="//vtstateparks.com/hiking.html">Vermont State Parks - Hiking</a>
        </p>
        <p>
            <a href="//www.greenmountainclub.org/hiking/hiking-recommendations/">Green Mountain Club</a>
        </p>
        <p>
            <a href="//www.crossvermont.org/our_trail/index.php">The Cross Vermont Trail</a>
        </p>
  

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
