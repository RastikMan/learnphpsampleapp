<?php

declare(strict_types = 1);

// Your Code
function display_array(array $array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function file_to_array(string $filename): array {

    $file = fopen(FILES_PATH.$filename, "r");

    $array = [];

    while(($line = fgetcsv($file)) !== false) {
        array_push($array, $line);
    }

    for($i = 1; $i < count($array); $i++) {
        $dateString = $array[$i][0];
        $timestamp = strtotime($dateString);
        $array[$i][0] = date("M d o", $timestamp);
    }

    fclose($file);

    return $array;
}

function array_to_table(array $array) {
    echo "<tr>";
    for ($i = 1; $i < count($array); $i++) {
        for ($j = 0; $j < count($array[$i]); $j++) {            
            if ($j === 3 & str_starts_with($array[$i][$j], "-") ) {
                echo "<td style=\"color:DarkRed;\">".$array[$i][$j]."</td>";
            } else if ($j === 3) {
                echo "<td style=\"color:DarkGreen;\">".$array[$i][$j]."</td>";
            } else {
                echo "<td>".$array[$i][$j]."</td>";
            }
        }
        echo "</tr>";
    }

}

function total_income(array $array): float {
    $total_income = 0;

    for ($i = 1; $i < count($array); $i++) {
        if (!str_starts_with($array[$i][3], "-") ) {
            $temp_var = (float) str_replace(['$', ','], '', $array[$i][3]);
            $total_income += $temp_var;
        }
    }

    return $total_income;
}

function total_expanse(array $array): float {
    $total_expanse = 0;

    for ($i = 1; $i < count($array); $i++) {
        if (str_starts_with($array[$i][3], "-") ) {
            $temp_var = (float) str_replace(['$', ','], '', $array[$i][3]);
            $total_expanse += $temp_var;
        }
    }

    return $total_expanse;
}

function total_profit(array $array): string {
    $total_expanse = 0;
    $total_income = 0;
    for ($i = 1; $i < count($array); $i++) {
        if (str_starts_with($array[$i][3], "-") ) {
            $temp_var = (float) str_replace(['$', ','], '', $array[$i][3]);
            $total_expanse += $temp_var;
        }
    }
    for ($i = 1; $i < count($array); $i++) {
        if (!str_starts_with($array[$i][3], "-") ) {
            $temp_var = (float) str_replace(['$', ','], '', $array[$i][3]);
            $total_income += $temp_var;
        }
    }

    $total_profit = $total_income + $total_expanse;

    if ($total_profit < 0) {
        return '-' . '$' . number_format($total_profit, 2, '.', ',');
    } else {
        return '$' . number_format($total_profit, 2, '.', ',');
    }
}

