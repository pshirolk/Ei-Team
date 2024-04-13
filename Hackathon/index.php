<?php
include 'top.php';
?>
<main>
    
    <h1>Mikey's VT Recreation Forum</h1>

    <section>
        <h2>Why I made this site</h2>
        <p>I, and many other Vermonters love all the recreational opportunities the Green Mountain State has to offer.  However I noticed there is no central place for people to share stories, talk about their adventures, reccomend trails, or discuss the problems facing our beloved outdoor activities.  Thats where this forum comes in.  I hope that you will help me make this forum into a thriving community of outdoor enthuisiasts.  
        </p>
    </section>
    <section>
        <h2>User Agreement and Guidlines</h2>
        <p>By posting to this forum you are agreeing to promote a friendly, respectful, and safe environment.  I ask that you refrain from using any language that could to considered harmful or hurtful to ANYONE.  This means no hateful words, no derogatory remarks, no singling out any one person or small group of people, no racism, sexism, homophobia, or any other type of bigotry.  Please be kind to one another and focus the discussion around outdoor recreation in Vermont.  I reserve the right to remove any post which I feel violates these guidlines at any time without notice.
        </p>
    </section>

    <section>
        <h2>The Local Spots In the Area</h2>
        <table>
            <caption>The Ones we have Ridden</caption>

            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Rating</th>

            </tr>
<?php
$sql = 'SELECT fldName, fldLocation, fldRating FROM tblFunSpots';
$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();

foreach($records as $record) {
    print '<tr>';
    print '<td>' . $record['fldName'] . '</td>';
    print '<td>' . $record['fldLocation'] . '</td>';
    print '<td>' . $record['fldRating'] . '</td>';
    print '</tr>' . PHP_EOL;
}

?>
        </table>
    </section>
</main>
<?php
include 'footer.php';
?>
