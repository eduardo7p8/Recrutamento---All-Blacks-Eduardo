<html>
<?php
pr($row);
exit;


?>

<body>
    <table>
        <tr>
            <th>First</th>
            <th>Middle</th>
            <th>Last</th>
            <th>Email</th>
        </tr>
        <?php foreach ($row as $row) { ?>
            <tr>
                <td><?php echo ($row['first']); ?></td>
                <td><?php echo ($row['middle']); ?></td>
                <td><?php echo ($row['last']); ?></td>
                <td><?php echo ($row['email']); ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>