<?php
// Función de comparación personalizada
function comparar_valores($a, $b) {
    // Comparación de los valores
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

// Array asociativo de ejemplo
$mi_array = array(
    'clave1' => 8,
    'clave2' => 3,
    'clave3' => 5,
    'clave4' => 1
);

// Antes de la clasificación
echo "Antes de la clasificación:\n";
print_r($mi_array);

// Usar uasort para ordenar el array según los valores
uasort($mi_array, 'comparar_valores');

// Después de la clasificación
echo "Después de la clasificación:\n";
print_r($mi_array);
?>