<?php

    {
        if (!empty($_POST)) {
            $dataArray = json_decode(file_get_contents('./data.json'), true);
            $dataArray[] = $_POST;
            file_put_contents('./data.json', json_encode($dataArray));

        }   else echo 'cia bus exception error';

        require(__DIR__ . './../Views/OutputPage.php');

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Electricity OutputPage</title>
</head>
<body>
    <fieldset style="border: 1px black solid; padding: 10px"
              <legend>Sąskaitos</legend> <br>
                <table style="border-collapse: collapse">
                    <tr>
                        <th style="border: solid 1px black; width: fit-content;background-color: lightgray; text-align: center">Mėnesis</th>
                        <th style="border: solid 1px black; width: fit-content;background-color: lightgray; text-align: center">Suvartota kWh</th>
                        <th style="border: solid 1px black; width: fit-content;background-color: lightgray; text-align: center">Vienos kWh kaina</th>
                        <th style="border: solid 1px black; width: fit-content;background-color: lightgray; text-align: center">Tarifas</th>
                        <th style="border: solid 1px black; width: fit-content;background-color: lightgray; text-align: center">Suma mokėti</th>
                    </tr>
                <?php

                foreach ($dataArray as $data): ?>
                    <tr>
                        <td style="border: solid 1px black; text-align: center">Menesis</td>
                        <td style="border: solid 1px black; text-align: center"><?= $data['kWhInput'] ?></td>
                        <td style="border: solid 1px black; text-align: center"><?= $data['costKWh'] ?></td>
                        <td style="border: solid 1px black; text-align: center"><?= $data['tariff'] ?></td>
                        <td style="border: solid 1px black; text-align: center"></p><?= $cost = $data['kWhInput'] * $data['costKWh']  ?></td>
                    </tr>
                <?php endforeach; ?>
                </table>
</body>
