<?php

// Your original list of colors
$originalColors = [
    "#E6D9D1", "#823D38", "#463639", "#75CCA6", "#BD4200", "#F39F00", "#D66806", "#FEEE8E", "#EDE4DB", "#C98502",
    "#EBC04D", "#E9CE8E", "#F89E64", "#DA1903", "#f2dd21", "#efde8b", "#C70212", "#D88317", "#F80304", "#ED0200",
    "#E74A03", "#F3CA69", "#FF000B", "#ACA99C", "#E00001", "#ED120A", "#F73D29", "#E1E6E3", "#EFEFEF", "#FDC78B",
    "#B5AB90", "#B1061D", "#F6CD4C", "#D6C01D", "#B8B781", "#EBCF2E", "#68517B", "#3B0005", "#C4B686", "#FD5404",
    "#FEB535", "#C7A65F", "#B46F13", "#ECAE1B", "#B11603", "#FFBB6D", "#EC464F", "#ffe066", "#FB3B34", "#4A8C03",
    "#B6A861", "#E9E5C2", "#FFBC2F", "#DADEC0", "#BBA69B", "#66B7EC", "#F7F1BC", "#D9A031", "#B51202", "#f20010",
    "#C18450", "#440D06", "#C6C8C3", "#C5B9A1", "#FFC800", "#c10000", "#FF3006", "#FE3A24", "#FF5542", "#978540",
    "#D0A254", "#F4B317", "#CF612A", "#D9CAA6"
];

// The new 10-color palette
$newPalette = [
    "#DAA520", "#8B4513", "#CD853F", "#D2691E", "#A0522D", 
    "#BDB76B", "#F4A460", "#DEB887", "#D2B48C", "#BC8F8F"
];

// Function to find the closest color
function findClosestColor($color, $palette) {
    $closestColor = "";
    $closestDistance = PHP_INT_MAX;

    $r1 = hexdec(substr($color, 1, 2));
    $g1 = hexdec(substr($color, 3, 2));
    $b1 = hexdec(substr($color, 5, 2));

    foreach ($palette as $paletteColor) {
        $r2 = hexdec(substr($paletteColor, 1, 2));
        $g2 = hexdec(substr($paletteColor, 3, 2));
        $b2 = hexdec(substr($paletteColor, 5, 2));

        $distance = sqrt(pow($r2 - $r1, 2) + pow($g2 - $g1, 2) + pow($b2 - $b1, 2));

        if ($distance < $closestDistance) {
            $closestDistance = $distance;
            $closestColor = $paletteColor;
        }
    }

    return $closestColor;
}

// Convert original colors to new palette
$convertedColors = [];
foreach ($originalColors as $color) {
    $convertedColors[] = findClosestColor($color, $newPalette);
}

// Print out the converted colors
print_r(implode("<br/>",$convertedColors));

?>

