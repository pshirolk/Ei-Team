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
    ?>" href="detail.php">Skiing Forum</a>

    <a class="<?php
    if ($pathParts['filename'] == 'biking') {
        print 'activePage';
    }
    ?>" href="detail2.php">Biking Forum</a>

    <a class="<?php
    if ($pathParts['filename'] == 'rockClimbing') {
        print 'activePage';
    }
    ?>" href="rockClimbing.php">Rock Climbing Forum</a>

    <a class="<?php
    if ($pathParts['filename'] == 'hiking') {
        print 'activePage';
    }
    ?>" href="hiking.php">Hiking Forum</a>

    <a class="<?php
    if ($pathParts['filename'] == 'form') {
        print 'activePage';
    }
    ?>" href="form.php">New Thread</a>
    
</nav>
