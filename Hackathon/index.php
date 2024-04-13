<?php
include 'top.php';
?>
<main>
    
    <h1>Cats gone wild!</h1>

    <section>
        <h2>ACTIVE GROUPS</h2>
        <p>Below is a list of active groups you can join.</p>
        /* list of groups here as different boxes */
        <figure>
            <img alt = "" 
                    src = "">
                <figcaption></figcaption>
        </figure>
    </section>

    <section>
        <h2>WEATHER</h2>
        <a class="weatherwidget-io" href="https://forecast7.com/en/44d48n73d21/burlington/" data-label_1="BURLINGTON, VT" data-label_2="WEATHER" data-theme="original" data-basecolor="#0f4416" data-cloudfill="#0f4416" >BURLINGTON, VT WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
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
