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
        <h2>HOTSPOTS</h2>
        <!--The div element for the map -->
        <div id="map"></div>

    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg", v: "weekly"});</script>
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
