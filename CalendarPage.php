<?php
    $thisPage = "Calendar-Page";
    include("Header.php");
    $mainNav = true;
?>

<div class="main-content dark-purple-text simple-border">
    <table id="calendar" class="purple-background simple-border">
        <tr>
            <th class="simple-border">Sunday</th>
            <th class="simple-border">Monday</th>
            <th class="simple-border">Tuesday</th>
            <th class="simple-border">Wednesday</th>
            <th class="simple-border">Thursay</th>
            <th class="simple-border">Friday</th>
            <th class="simple-border">Saturday</th>
        </tr>
            <?php
                $day = 1;
                for($week = 1; $week <= 5; $week++) {
                    echo "<tr>";
                    for($day; $day <= 7*$week; $day++) {
                        if($day <= 31) {
                            echo "<td class='simple-border'>$day</td>";
                        }
                        else {
                            echo "<td class='simple-border'></td>";
                        }
                    }
                    echo "</tr>";
                }
            ?>
    </table>
</div>

<?php
    include("Footer.php");
?>