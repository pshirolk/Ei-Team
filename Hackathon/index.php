<?php
include 'top.php';
?>
<main>
    
    <h1>Welcome!!!!</h1>

    <section>
        <h2>Embark on Your Next Adventure</h2>
        <p> Welcome to our gateway to thrilling outdoor escapades!
        Here, you'll discover a treasure trove of upcoming trips tailored for outdoor enthusiasts like you.
        Whether you're drawn to the serene trails of a forest hike, the adrenaline rush of skiing down powdery slopes,
        or the invigorating challenge of biking through rugged terrain, we have something for everyone.
        Scroll down to explore our upcoming adventures for the month and embark on unforgettable journeys into nature's embrace.
        </p>
    </section>

    <section>
        <h2>How to Sign Up</h2>
        <p> Ready to embark on your next outdoor adventure? Joining our trips is easy!
        Simply fill out the sign up form and you will receive a confirmation via email.
        Don't miss out on the opportunity to create unforgettable memories and connect with fellow outdoor enthusiasts.
        Sign up NOW!! Do it! Do it right now! We know you want to!
        </p>
    </section>


    <section>
        <h2>Featured Trips</h2>
        <p>
        </p>
    </section>

    <section>
        <h2>Stay connected</h2>
        <p>Don't miss out on future adventures! Sign up for our newsletter to receive the latest updates on upcoming trips and events.
        Follow us on Instagram <a href="https://www.instagram.com/catsoutuvm/"><?php echo "@catsoutuvm"; ?></a> to connect with fellow
        outdoor enthusiasts and tag us in your posts!
        <p>
        <table>
            <caption></caption>

            <tr>
                <th></th>
                <th></th>
                <th></th>

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
