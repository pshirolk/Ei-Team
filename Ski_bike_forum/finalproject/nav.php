<nav>
    <a class="<?php
    if ($pathParts['filename'] == 'index') {
        print 'activePage';
    }
    ?>" href="index.php">Home</a>

    <a class="<?php
    if ($pathParts['filename'] == 'detail') {
        print 'activePage';
    }
    ?>" href="detail.php">About</a>

    <a class="<?php
    if ($pathParts['filename'] == 'survey') {
        print 'activePage';
    }
    ?>" href="form.php">Survey</a>

    <a class="<?php
    if ($pathParts['filename'] == 'array') {
        print 'activePage';
    }
    ?>" href="array.php">Data</a>
</nav>