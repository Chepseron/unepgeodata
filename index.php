<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                padding: 5px;
            }

            th {text-align: left;}
        </style>
    </head>
    <body>

        <?php
        $con = mysqli_connect('localhost', 'root', 'root', 'unep');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        mysqli_select_db($con, "unep");
        $sql = "SELECT * FROM geodata";
        $result = mysqli_query($con, $sql);

        echo "<table>
                <tr>
                <th>IDGEODATA</th>
                <th>iso2</th>
                <th>year</th>
                <th>value</th>
                </tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['idgeodata'] . "</td>";
            echo "<td>" . $row['iso2'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['value'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
        ?>
    </body>
</html>