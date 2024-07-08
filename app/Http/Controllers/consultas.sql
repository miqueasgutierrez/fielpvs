

$array1 = ['category1', 'category2', 'category3']; // Categories to exclude
$array2 = ['category2', 'category4', 'category5', 'category1']; // Original categories

// Remove categories in $array1 from $array2
$result = array_diff($array2, $array1);

print_r($result); // Output: Array ( [1] => category4 [2] => category5 )

  <img src="../imagen/{{$item->imagen}}" class="w-16 h-16 rounded-full" alt="Imagen">