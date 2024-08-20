<?php
function cargarNombresEstudiantes() {
    return [
        ['dni' => '12345678A', 'nombre' => 'Juan Pérez'],
        ['dni' => '23456789B', 'nombre' => 'Ana Gómez'],
        ['dni' => '34567890C', 'nombre' => 'Luis Martínez'],
        ['dni' => '45678901D', 'nombre' => 'Marta López'],
        ['dni' => '56789012E', 'nombre' => 'Carlos Sánchez'],
        ['dni' => '67890123F', 'nombre' => 'Laura Fernández'],
        ['dni' => '78901234G', 'nombre' => 'Pedro García'],
        ['dni' => '89012345H', 'nombre' => 'Elena Morales'],
        ['dni' => '90123456I', 'nombre' => 'Raúl Romero'],
        ['dni' => '01234567J', 'nombre' => 'Sofía Ruiz'],
    ];
}

function cargarDatosEstudiantes() {
    return [
        '12345678A' => ['nota1' => 9, 'nota2' => 8, 'asistencias' => 35],
        '23456789B' => ['nota1' => 7, 'nota2' => 9, 'asistencias' => 30],
        '34567890C' => ['nota1' => 8, 'nota2' => 8, 'asistencias' => 32],
        '45678901D' => ['nota1' => 9, 'nota2' => 9, 'asistencias' => 40],
        '56789012E' => ['nota1' => 7, 'nota2' => 7, 'asistencias' => 28],
        '67890123F' => ['nota1' => 9, 'nota2' => 9, 'asistencias' => 33],
        '78901234G' => ['nota1' => 6, 'nota2' => 8, 'asistencias' => 36],
        '89012345H' => ['nota1' => 8, 'nota2' => 9, 'asistencias' => 24],
        '90123456I' => ['nota1' => 9, 'nota2' => 8, 'asistencias' => 31],
        '01234567J' => ['nota1' => 7, 'nota2' => 7, 'asistencias' => 29],
    ];
}

function calcularPorcentajeAsistencias($asistencias, $totalClases = 40) {
    return ($asistencias / $totalClases) * 100;
}

function evaluarEstudiantes() {
    $estudiantes = cargarNombresEstudiantes();
    $datosEstudiantes = cargarDatosEstudiantes();
    $totalClases = 40;
    
    foreach ($estudiantes as $estudiante) {
        $dni = $estudiante['dni'];
        $nombre = $estudiante['nombre'];
        $datos = $datosEstudiantes[$dni];
        
        $nota1 = $datos['nota1'];
        $nota2 = $datos['nota2'];
        $asistencias = $datos['asistencias'];
        $porcentajeAsistencias = calcularPorcentajeAsistencias($asistencias, $totalClases);
        
        if ($nota1 >= 8 && $nota2 >= 8) {
            if ($porcentajeAsistencias >= 80) {
                echo "Alumno regular: $nombre (DNI: $dni)\n";
            } else {
                echo "Debe realizar clases de apoyo: $nombre (DNI: $dni)\n";
            }
        } elseif (($nota1 >= 8 || $nota2 >= 8) && $porcentajeAsistencias >= 80) {
            echo "Debe recuperar un parcial: $nombre (DNI: $dni)\n";
        } else {
            echo "Alumno libre: $nombre (DNI: $dni)\n";
        }
    }
}

evaluarEstudiantes();
?>
