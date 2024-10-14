for ($i = 0; $i < count($tabData); $i++) {
                echo '<tr> <th><a href="./views/modifier.php?id=' . $tabData[$i]["id"] . '"><img src="./chemain/vers/le/dossier.png" alt=""></a></th>';
                foreach ($tabData[$i] as $key => $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }