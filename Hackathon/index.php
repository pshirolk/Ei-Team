<?php
include 'top.php';
?>
<main>
    
    <h1></h1>

    <section>
        <h2></h2>
        <p></p>
    </section>
    <section>
        <h2></h2>
        <p></p>
    </section>

    <section>
        <h2></h2>
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
