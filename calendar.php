<?php
    include("header.php");
    $thisPage = "Calendar-Page";
?>

<div class="main-content dark-purple-text">
    <table id="calendar" class="purple-background">
        <tr>
            <th>Sunday</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursay</th>
            <th>Friday</th>
            <th>Saturday</th>
        </tr>
            <?php
                $day = 1;
                for($week = 1; $week <= 5; $week++) {
                    echo "<tr>";
                    for($day; $day <= 7*$week; $day++) {
                        if($day <= 31) {
                            echo "<td>$day</td>";
                        }
                        else {
                            echo "<td></td>";
                        }
                    }
                    echo "</tr>";
                }
            ?>
    </table>
</div>

<?php
    include("footer.php");
?>