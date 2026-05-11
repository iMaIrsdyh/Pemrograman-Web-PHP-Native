<?php
$students = [
    [
        "nim" => "TI001",
        "name" => "Budi Santoso",
        "major" => "Informatika",
        "grade" => [85, 90, 78, 82]
    ],
    [
        "nim" => "TI002",
        "name" => "Anisa Rahma",
        "major" => "Informatika",
        "grade" => [88, 85, 90, 92]
    ],
    [
        "nim" => "SI001",
        "name" => "Dimas Prayoga",
        "major" => "Sistem Informasi",
        "grade" => [78, 80, 85, 75]
    ],
    [
        "nim" => "SI002",
        "name" => "Ratna Dewi",
        "major" => "Sistem Informasi",
        "grade" => [92, 88, 85, 90]
    ]
];

function hitungRataRata($grade)
{
    return array_sum($grade) / count($grade);
}

function tentukanGrade($nilai)
{
    if ($nilai >= 90) return "A";
    if ($nilai >= 80) return "B";
    if ($nilai >= 70) return "C";
    if ($nilai >= 60) return "D";
    return "E";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Nilai Rata-rata</th>
            <th>Grade</th>
        </tr>

        <?php foreach ($students as $student): ?>
            <?php
            $rataRata = hitungRataRata($student["grade"]);
            $grade = tentukanGrade($rataRata);
            ?>
            <tr>
                <td><?= $student["nim"] ?></td>
                <td><?= $student["name"] ?></td>
                <td><?= $student["major"] ?></td>
                <td><?= number_format($rataRata, 2) ?></td>
                <td><?= $grade ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>