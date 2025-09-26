<?php
    $products_array = [];
    $file_path = 'products.txt';
    if (file_exists($file_path)) {
        $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            list($name, $price) = explode(',', $line);
            $products_array[] = ['name' => trim($name), 'price' => (int)trim($price)];
        }
        usort($products_array, function($a, $b) {
            return $a['price'] <=> $b['price'];
        });
        echo "<table border='1' cellspacing='0'>";
        echo "<thead><tr><th>Product Name</th><th>Price</th></tr></thead>";
        echo "<tbody>";
        foreach ($products_array as $product) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($product['name']) . "</td>";
            echo "<td>" . htmlspecialchars($product['price']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Error: The file products.txt was not found.</p>";
    }
?>