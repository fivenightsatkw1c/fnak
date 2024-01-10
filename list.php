<table border="1">
    <thead>
        <tr>
            <th>GroepNaam</th>
            <th>Time</th>
            <th>Selecteer hier</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Assuming you have an array of group names
        $groupNames = array("Group A", "Group B", "Group C");

        foreach ($groupNames as $groupName) {
            echo "<tr>";
            echo "<td>$groupName</td>";

            // Generate time slots from 8:30 to 16:30 with 1-hour interval
            $startTime = strtotime("2024-01-22 08:30");
            $endTime = strtotime("2024-01-23 16:30");

            while ($startTime <= $endTime) {
                $timeFormatted = date("H:i", $startTime);
                echo "<td>$timeFormatted</td>";
                echo "<td><a href='select_page.php?group=$groupName&time=$timeFormatted'>Selecteer hier</a></td>";
                echo "</tr><tr>";
                $startTime = strtotime('+1 hour', $startTime);
            }
        }
        ?>
    </tbody>
</table>
