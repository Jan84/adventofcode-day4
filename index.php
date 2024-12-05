<?php
$file = fopen("file.txt", "r");
$letters = [];
$xmas = 0;
$xmas2 = 0;

while (!feof($file)) {
    $line = fgets($file);
    array_push($letters, $line);
}

fclose($file);

foreach ($letters as $row => $item) {
    foreach (str_split($item) as $col => $char) {
        // PART 1
        if ($char == 'X') {
            // We have 'X', search for 'M' in all directions
            // UP
            $up = $letters[$row - 1][$col] == 'M' ? true : false;
            if ($up) {
                // We have 'XM', search for 'A' UP
                $up = $letters[$row - 2][$col] == 'A' ? true : false;
                if ($up) {
                    // We have 'XMA', search for 'S' UP
                    $up = $letters[$row - 3][$col] == 'S' ? true : false;
                    if ($up) {
                        // Hurrrray, We have 'XMAS'
                        $xmas += 1;
                    }
                }
            }

            // UP LEFT
            $upLeft = $letters[$row - 1][$col - 1] == 'M' ? true : false;
            if ($upLeft) {
                // We have 'XM', search for 'A' UP LEFT
                $upLeft = $letters[$row - 2][$col - 2] == 'A' ? true : false;
                if ($upLeft) {
                    // We have 'XMA', search for 'S' UP LEFT
                    $upLeft = $letters[$row - 3][$col - 3] == 'S' ? true : false;
                    if ($upLeft) {
                        // Hurrrray, We have 'XMAS'
                        $xmas += 1;
                    }
                }
            }

            // UP RIGHT
            $upRight = $letters[$row - 1][$col + 1] == 'M' ? true : false;
            if ($upRight) {
                // We have 'XM', search for 'A' UP RIGHT
                $upRight = $letters[$row - 2][$col + 2] == 'A' ? true : false;
                if ($upRight) {
                    // We have 'XMA', search for 'S' UP RIGHT
                    $upRight = $letters[$row - 3][$col + 3] == 'S' ? true : false;
                    if ($upRight) {
                        // Hurrrray, We have 'XMAS'
                        $xmas += 1;
                    }
                }
            }

            // DOWN
            $down = $letters[$row + 1][$col] == 'M' ? true : false;
            if ($down) {
                // We have 'XM', search for 'A' DOWN
                $down = $letters[$row + 2][$col] == 'A' ? true : false;
                if ($down) {
                    // We have 'XMA', search for 'S' DOWN
                    $down = $letters[$row + 3][$col] == 'S' ? true : false;
                    if ($down) {
                        // Hurrrray, We have 'XMAS'
                        $xmas += 1;
                    }
                }
            }

            // DOWN LEFT
            $downLeft = $letters[$row + 1][$col - 1] == 'M' ? true : false;
            if ($downLeft) {
                // We have 'XM', search for 'A' DOWN LEFT
                $downLeft = $letters[$row + 2][$col - 2] == 'A' ? true : false;
                if ($downLeft) {
                    // We have 'XMA', search for 'S' DOWN LEFT
                    $downLeft = $letters[$row + 3][$col - 3] == 'S' ? true : false;
                    if ($downLeft) {
                        // Hurrrray, We have 'XMAS'
                        $xmas += 1;
                    }
                }
            }

            // DOWN RIGHT
            $downRight = $letters[$row + 1][$col + 1] == 'M' ? true : false;
            if ($downRight) {
                // We have 'XM', search for 'A' DOWN RIGHT
                $downRight = $letters[$row + 2][$col + 2] == 'A' ? true : false;
                if ($downRight) {
                    // We have 'XMA', search for 'S' DOWN RIGHT
                    $downRight = $letters[$row + 3][$col + 3] == 'S' ? true : false;
                    if ($downRight) {
                        // Hurrrray, We have 'XMAS'
                        $xmas += 1;
                    }
                }
            }

            // LEFT
            $left = $item[$col - 1] == 'M' ? true : false;
            if ($left) {
                // We have 'XM', search for 'A' LEFT
                $left = $item[$col - 2] == 'A' ? true : false;
                if ($left) {
                    // We have 'XMA', search for 'S' LEFT
                    $left = $item[$col - 3] == 'S' ? true : false;
                    if ($left) {
                        // Hurrrray, We have 'XMAS'
                        $xmas += 1;
                    }
                }
            }

            // RIGHT
            $right = $item[$col + 1] == 'M' ? true : false;
            if ($right) {
                // We have 'XM', search for 'A' RIGHT
                $right = $item[$col + 2] == 'A' ? true : false;
                if ($right) {
                    // We have 'XMA', search for 'S' RIGHT
                    $right = $item[$col + 3] == 'S' ? true : false;
                    if ($right) {
                        // Hurrrray, We have 'XMAS'
                        $xmas += 1;
                    }
                }
            }
        }

        // PART 2
        if ($char == 'A') {
            $upLeft = $letters[$row - 1][$col - 1];
            if ($upLeft == 'M' || $upLeft == 'S') {
                // Search for 'M' or 'S' DOWN RIGHT
                $downRight = $letters[$row + 1][$col + 1];
                if (($upLeft == 'M' && $downRight == 'S') || ($upLeft == 'S' && $downRight == 'M')) {
                    // Search for 'M' or 'S' UP RIGHT
                    $upRight = $letters[$row - 1][$col + 1];
                    if ($upRight == 'M' || $upRight == 'S') {
                        // Search for 'M' or 'S' DOWN LEFT
                        $downLeft = $letters[$row + 1][$col - 1];
                        if (($upRight == 'M' && $downLeft == 'S') || ($upRight == 'S' && $downLeft == 'M')) {
                            // Hurrrray, We have 'XMAS'
                            $xmas2 += 1;
                        }
                    }
                }
            }
        }
    }
}

echo 'XMAS appear ' . $xmas . ' times.<br>===============<br>';
echo 'X-MAS appear ' . $xmas2 . ' times.';