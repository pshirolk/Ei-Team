<?php
include 'top.php';
?>
<main>
    <h1>Local Resorts</h1>

    <section>
        <h2>My Favorites</h2>
        <p>Vermont is filled with many fantastic ski resorts. I, personally, have been skiing since I was two. 
            I started my first lessons at Smugglers Notch Resort. I love this resort to this day because it 
            has been able to remain one of the few resorts that doesn't get too crowded, has a fantastic 
            environment that makes season pass holders stick around, and sports some of the best terrain in
            the Green Mountain State!
        </p>
        <p>Although Smuggs remains one of my go-to destinations on a pow day, after a few years there as a young 
            child my parents started taking me to Jay Peak. Now Jay is a mountain I could ski for the rest of my life. 
            They have everything you could ever hope for out of an East Coast resort. They have a Gondola straight to 
            the Peak, they have a waterpark, ski in/out dining and drinks, and the terrain is just amazing. I will
            say, however, you will enjoy Jay much less if you snowboard, as many of the trails lead to long runouts
            which, on a slow day, will leave you walking.
        </p>
        <p>That's all for now folks!</p>

    </section>

    <section>
        <h2>The Local Resorts In the Area</h2>
        <table>
            <caption>The Ones I have Ridden</caption>

            <tr>
                <th>Name</th>
                <th>Vibes</th>
                <th>Terrain</th>

            </tr>

            <tr>
                <td>Smugglers Notch</td>
                <td>4/5</td>
                <td>4/5</td>

            </tr>

            <tr>
                <td>Jay Peak</td>
                <td>5/5</td>
                <td>4/5</td>

            </tr>

            <tr>
                <td>Sugarbush Resort</td>
                <td>4/5</td>
                <td>3/5</td>

            </tr>

            <tr>
                <td>Stowe Mountain Resort</td>
                <td>1/5</td>
                <td>4/5</td>

            </tr>

            <tr>
                <td colspan="3">Source: Joel Davidson(me) - Link to Wordle because it's fun:<cite><a href=
                    "https://www.nytimes.com/games/wordle/index.html" target="_blank">
                    https://www.nytimes.com/games/wordle/index.html</a></cite></td>
            </tr>

        </table>
    </section>

    <section>
        <h2>Ranking the Resorts</h2>
        <figure class = "rounded">
            <img class = "rounded" alt="Jay Peak" src="images/JayPeak.jpg">
            <figcaption><cite><a href="https://www.powder.com/latitudes/where-to-stay-at-jay-peak/"
            target="_blank">Jay Peak On a Bluebird Day</a></cite></figcaption>
        </figure>
        <ol>
            <li>Jay Peak Resort</li>
            <li>Smugglers Notch Resort</li>
            <li>SugarBush Resort</li>
            <li>Stowe Mountain Resort</li>
        </ol>
    </section>

    <section>
        <h2>The Local Resorts In the Area</h2>
        <table>
            <caption>The Ones I have Ridden</caption>

            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Factoids</th>

            </tr>
<?php
$sql = 'SELECT fldName, fldLocation, fldFactoids FROM tblTheResorts';
$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();

foreach($records as $record) {
    print '<tr>';
    print '<td>' . $record['fldName'] . '</td>';
    print '<td>' . $record['fldLocation'] . '</td>';
    print '<td>' . $record['fldFactoids'] . '</td>';
    print '</tr>' . PHP_EOL;
}
?>
            <tr>
                <td colspan="3">Source: Joel Davidson(me) - Link to Wordle because it's fun:<cite><a href=
                    "https://www.nytimes.com/games/wordle/index.html" target="_blank">
                    https://www.nytimes.com/games/wordle/index.html</a></cite></td>
            </tr>

        </table>
    </section>
    
</main>
<?php
include 'footer.php';
?>
</body>
</html>