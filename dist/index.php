<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Airstream Bar</title>
  <!-- Link to your Tailwind CSS file -->
  <link rel="stylesheet" href="output.css">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
<!--
  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" href="/icon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="icon.png">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="manifest" href="site.webmanifest">
  <meta name="theme-color" content="#fafafa">-->
</head>
<body class="bg-gray-100">
  <!-- Main Container -->
  <div class="flex flex-col items-center">
    <!-- Logo Section -->
    <div class="">
      <!-- Replace 'logo.svg' with the path to your actual logo -->
      <img src="img/airstream-bar-logo-light.svg" alt="Airstream Bar Logo" class="w-32 h-32">
    </div>

    <!-- Navigation Links -->
    <nav class="">
      <a href="#" class="mx-4 text-lg text-gray-700 hover:text-black">Menü</a>
      <a href="#" class="mx-4 text-lg text-gray-700 hover:text-black">Bar</a>
    </nav>

    <!-- Drinks Section -->
<!-- Drinks Sections -->
<div class="w-full">
<?php

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

function isDarkColor($hexColor) {
    // Special cases for colors that should have white text
    if (in_array($hexColor, ["#FC5C65", "#FF7F50"])) {
        return true;
    }

    $r = hexdec(substr($hexColor, 1, 2));
    $g = hexdec(substr($hexColor, 3, 2));
    $b = hexdec(substr($hexColor, 5, 2));
    $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
    return $luminance < 0.5;
}


// The new 10-color palette
//$newPalette = [
//    "#DAA520", "#8B4513", "#CD853F", "#D2691E", "#A0522D", 
//    "#BDB76B", "#F4A460", "#DEB887", "#D2B48C", "#BC8F8F"
//];
//

//$newPalette = [
//    "#D3E0DC", "#FAD02E", "#F08080", "#FFB6C1", "#ADD8E6", 
//    "#FFDAB9", "#E6E6FA", "#FFE4E1", "#90EE90", "#D3D3D3", "#2F4F4F"
//];

// The expanded pastel palette
//$newPalette = [
//    "#D3E0DC", "#FAD02E", "#F08080", "#FFB6C1", "#ADD8E6", 
//    "#FFDAB9", "#E6E6FA", "#FFE4E1", "#90EE90", "#D3D3D3", 
//    "#505050", "#FFC0CB", "#87CEEB", "#FFA07A", "#98FB98", 
//    "#F5DEB3", "#DDA0DD", "#708090", "#FF6347", "#FFD700", 
//    "#20B2AA", "#FF4500", "#9370DB", "#7FFF00"
//];

// The expanded and adjusted palette
//$newPalette = [
//    "#D3E0DC", "#FAD02E", "#F08080", "#FFB6C1", "#ADD8E6", 
//    "#FFDAB9", "#E6E6FA", "#FFE4E1", "#90EE90", "#D3D3D3", 
//    "#2E2E2E", "#FFC0CB", "#87CEEB", "#FFA07A", "#98FB98", 
//    "#F5DEB3", "#DDA0DD", "#708090", "#FF6347", "#FFD700", 
//    "#20B2AA", "#FFA07A", "#9370DB", "#7FFF00", "#FFB347", 
//    "#483D8B"
//];

// The expanded and adjusted palette

$newPalette = [
    "#D3E0DC", "#FAD02E", "#F08080", "#FFB6C1", "#ADD8E6", 
    "#FFDAB9", "#E6E6FA", "#FFE4E1", "#90EE90", "#D3D3D3", 
    "#2E2E2E", "#1C1C1C", "#FFC0CB", "#87CEEB", "#FFA07A", 
    "#98FB98", "#F5DEB3", "#DDA0DD", "#708090", "#FFD700", 
    "#20B2AA", "#9370DB", "#7FFF00", "#FFB347", "#483D8B", 
    "#FF7F50", "#FA8072", "#E9967A", "#FF6B6B", "#FC5C65"
];



$categories = ["Longdrink","All Day Cocktail","Before Dinner Cocktail","Sparkling Cocktail","After Dinner Cocktail","Hot Drink" ];

foreach ($categories as $category) {
    echo "<h2 class='text-2xl font-bold ml-2 mt-10'>{$category}s</h2>";
    echo "<div class='flex overflow-x-auto snap-x snap-mandatory scroll-pl-6 pb-2'>";
    
    $json = file_get_contents('dummy-cocktails.json');
    $drinks = json_decode($json, true);

    foreach ($drinks as $drink) {
      if (isset($drink['category']) && $drink['category'] === $category) {
        $bgColor = is_array($drink['colors']) ? $drink['colors'][0] : $drink['colors'];
        
        // Convert the bgColor to one from the new palette
        $bgColor = findClosestColor($bgColor, $newPalette);

        $textColor = isDarkColor($bgColor) ? 'text-white' : 'text-black';
//        echo "<script>console.log('{$bgColor}' );</script>";
        echo "<div class='flex-none w-40 h-40 rounded-lg m-2 bg-white shadow-lg snap-start' style='background-color: {$bgColor}'>";
        echo "<div class='p-4'>";
        echo "<p class='text-center font-bold text-lg {$textColor}'>{$drink['name']}</p>";
        echo "</div>";
        echo "</div>";
      }
    }
    echo "</div>";
}
?>
  
</div>
    </div>

    <!-- Optional JavaScript -->
    <script>
    // Add any JavaScript you might need here
  </script>
</body>
</html>

