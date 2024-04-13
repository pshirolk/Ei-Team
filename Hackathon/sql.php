<?php
include 'top.php';
?>
<main>
    <h1>SQL</h1>
    <h2>Create Table</h2>
    
    <pre>
       CREATE TABLE tblForumPost(
        pmkPostID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        fldEmail VARCHAR(50),
    	fldTitle VARCHAR(50),
    	fldBody VARCHAR(200),
        fldTopic VARCHAR(20),
        fldRating VARCHAR(1)
    );
    </pre>


    <h2>Select Data</h2>
    <pre>
        SELECT fldName, fldLocation, fldFactoids FROM tblTheResorts
    </pre>


</main>
<?php include 'footer.php'; ?>
</body>
</html>
