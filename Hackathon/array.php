<?php
include 'top.php';

$skiBumWinners = array(
    array(2017, 'Miranda Corliss', 'The Boom!', '22.59'),
    array(2018, 'Lucille Rogoff', 'Gorillas In The Mist', '28.17'),
    array(2019, 'Heather House', 'Gorillas In The Mist', '23.76'),
    array(2022,'Lyndsay Gang', 'More Cray', '24.38'),
    array(2023, 'Lauren Reck', 'Dilly', '23.47')
    );

?>
<main class = "data">
    <h1>My Experiences</h1>

    <section>
        <h2>Ski Bum 2023</h2>

        <p>Killington Resort hosts an annual Ski Bum race, hosted by Michelob ULTRA, where skiers and boarders alike 
            form teams to compete in a race to the bottom of the hill. It is a very fun event that brings lots of people
            together and allows visitors to make the most of what the mountain has to offer. If there's anything that Vermont
            can do well, it's instilling a sense of community. As a skier, I see it all the time. Everyone feels as though they
            have the right of way, and people have it out for each other. There are lots of different types of people
            who come to Killington, and other mountains alike, and most of them don't get along. With all the apres 
            events and the energy surrounding the entire series there's little room for anger and ego.
        </p>

    </section>

    <section>
        <h2>Mardi Gras - Jay Peak</h2>

        <p>I can remember very clearly my first Jay Peak Mardi Gras celebration. I don't know if I even knew Mardi
            Gras existed at the time, but I definitely never knew how much people celebrated. It's truly a sight to see,
            and Jay does it like no other. They provide a week of live music, food, celebrity chefs and so much more.
            They cover the cost, so it's free to us! By the end of the week, the trees along the lifts are covered in beads
            and bras. You see kids skiing around barely being able to even see through the pile of beads they have around their necks.
            I have never visited another resort during a Mardi Gras celebration, but I can say with a significant degree of certainty
            that no one does it like Jay does it.
        </p>

    </section>

    <section>
        <h2>Previous Winners</h2>
        <h3>Last <?php echo count($skiBumWinners); ?> Winners.</h3>
        <ol>
<?php
foreach ($skiBumWinners as $skiBumWinner) {
    print '<li>';
    print $skiBumWinner[0] . ', ';
    print $skiBumWinner[1] . ', ';
    print $skiBumWinner[2] . ', ';
    print $skiBumWinner[3] . ', ';
    print $skiBumWinner[4];
    print '<li>' . PHP.EOL;
}
?>
        </ol>

        <p>
            Source: Killington.com - killington.com/things-to-do/events/ski-bum-series?fbclid=IwAR01dRTdUQzVBOsB9w98IYY5BG_KMcsJy7A7KcjE8ZJksE6YpgjaQt9KQPE

            Source: findandgoseek.net - https://www.findandgoseek.net/listing/jay-peaks-mardi-gras/fairs-festivals
        </p>
    </section>
    
</main>
<?php
include 'footer.php';
?>