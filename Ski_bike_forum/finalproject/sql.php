<?php
include 'top.php';
?>
<main>
    <h1>SQL</h1>
    <h2>Create Table</h2>
    
    <pre>
        CREATE TABLE tblTheResorts(
            pmkTheResorts INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldName VARCHAR(20),
            fldLocation VARCHAR(20),
            fldFactoids VARCHAR(50)
        )    
    </pre>

    <pre>
        CREATE TABLE tblFavoriteMountains(
            pmkFavoriteMountains INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fldEmail VARCHAR(30),
            fldJay VARCHAR(10),
            fldSmuggs VARCHAR(1),
            fldBush VARCHAR(1),
            fldStowe VARCHAR(1),
            fldMad VARCHAR(1),
            fldOkemo VARCHAR(1),
            fldKill VARCHAR(1),
            fldBolton VARCHAR(1),
            fldAgree VARCHAR(30)
        )    
    </pre>
    <h2>Insert Data</h2>
    <pre>
        INSERT INTO tblTheResorts (fldName, fldLocation, fldFactoids) VALUES
        ('Sugarbush', 'Warren', 'Elevation: 4083 ft; AVG Snowfall: 209 in'),
        ('Stowe', 'Stowe', 'Elevation: 4395 ft; AVG Snowfall: 235 in'),
        ('Jay Peak', 'Jay', 'Elevation: 3862 ft; AVG Snowfall: 359 in'),
        ('Smugglers Notch', 'Jeffersonville', 'Elevation: 2610 ft; AVG Snowfall: 280 in')
    </pre>

    <pre>
        INSERT INTO tblFavoriteMountains (fldEmail, fldJay, fldSmuggs, fldBush, fldStowe, fldMad, fldOkemo, fldKill, fldBolton, fldAgree) VALUES
    ('email', 1, 1, 1, 1, 1, 1, 1, 1, 'Strongly Disagree');
    </pre>

    <h2>Select Data</h2>
    <pre>
        SELECT fldName, fldLocation, fldFactoids FROM tblTheResorts
    </pre>


</main>
<?php include 'footer.php'; ?>
</body>
</html>