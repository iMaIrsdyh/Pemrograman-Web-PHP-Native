<?php
$data = [
    "name" => "Karimah Irsyadiyah",
    "nim" => "2411533018",
    "major" => "Informatika",
    "semester" => 4,
    "subjects" => [
        [
            "code" => "IF2101",
            "name" => "Pemrograman Web",
            "sks" => 3,
            "grades" => [
                "assigment" => 85,
                "uts" => 82,
                "uas" => 88
            ]
        ],
        [
            "code" => "IF2102",
            "name" => "Algoritma dan Struktur Data",
            "sks" => 4,
            "grades" => [
                "assigment" => 90,
                "uts" => 85,
                "uas" => 82
            ]
        ],
        [
            "code" => "IF2103",
            "name" => "Basis Data",
            "sks" => 3,
            "grades" => [
                "assigment" => 80,
                "uts" => 90,
                "uas" => 90
            ]
        ],
        [
            "code" => "IF2104",
            "name" => "Jaringan Komputer",
            "sks" => 3,
            "grades" => [
                "assigment" => 88,
                "uts" => 85,
                "uas" => 90
            ]
        ],
        [
            "code" => "IF2105",
            "name" => "Sistem Operasi",
            "sks" => 3,
            "grades" => [
                "assigment" => 95,
                "uts" => 90,
                "uas" => 92
            ]
        ],
        [
            "code" => "IF2106",
            "name" => "Matematika Diskrit",
            "sks" => 2,
            "grades" => [
                "assigment" => 75,
                "uts" => 90,
                "uas" => 90
            ]
        ]
    ]
];

function hitungNilaiAkhir($tugas, $uts, $uas)
{
    return ($tugas * 0.2) + ($uts * 0.4) + ($uas * 0.4);
}

function tentukanGradeHuruf($nilai)
{
    if ($nilai >= 85) {
        return "A";
    } elseif ($nilai >= 80) {
        return "A-";
    } elseif ($nilai >= 75) {
        return "B+";
    } elseif ($nilai >= 70) {
        return "B";
    } elseif ($nilai >= 65) {
        return "B-";
    } elseif ($nilai >= 60) {
        return "C+";
    } elseif ($nilai >= 55) {
        return "C";
    } elseif ($nilai >= 45) {
        return "D";
    } else {
        return "E";
    }
}

$totalSks = 0;
foreach ($data["subjects"] as $subject) {
    $totalSks += $subject["sks"];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Hasil Studi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            color: #333;
        }
        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: #4a5568;
            margin-bottom: 40px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .student-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .student-card h5 {
            margin-bottom: 15px;
            font-weight: bold;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-weight: 600;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .footer {
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #4a5568;
            margin-top: 30px;
            padding: 20px;
            background: rgba(116, 75, 162, 0.1);
            border-radius: 10px;
        }
        .grade-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
            color: white;
        }
        .grade-A { background-color: #28a745; }
        .grade-A- { background-color: #20c997; }
        .grade-B+ { background-color: #90b817; }
        .grade-B { background-color: #ffc107; color: #212529; }
        .grade-B- { background-color: #fd7e14; }
        .grade-C+ { background-color: #e83e8c; }
        .grade-C { background-color: #6c757d; }
        .grade-D { background-color: #dc3545; }
        .grade-E { background-color: #343a40; }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Kartu Hasil Studi</div>

        <div class="student-card">
            <div class="row">
                <div class="col-md-6">
                    <h5>Informasi Mahasiswa</h5>
                    <p><strong>Nama:</strong> <?= $data["name"] ?></p>
                    <p><strong>NIM:</strong> <?= $data["nim"] ?></p>
                </div>
                <div class="col-md-6">
                    <h5>Detail Akademik</h5>
                    <p><strong>Program Studi:</strong> <?= $data["major"] ?></p>
                    <p><strong>Semester:</strong> <?= $data["semester"] ?></p>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Tugas (20%)</th>
                        <th>UTS (40%)</th>
                        <th>UAS (40%)</th>
                        <th>Nilai Akhir</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data["subjects"] as $subject): ?>
                        <?php
                        $tugas = $subject["grades"]["assigment"];
                        $uts = $subject["grades"]["uts"];
                        $uas = $subject["grades"]["uas"];
                        $nilaiAkhir = hitungNilaiAkhir($tugas, $uts, $uas);
                        $grade = tentukanGradeHuruf($nilaiAkhir);
                        $gradeClass = 'grade-' . $grade;
                        ?>
                        <tr>
                            <td><?= $subject["code"] ?></td>
                            <td><?= $subject["name"] ?></td>
                            <td><?= $subject["sks"] ?></td>
                            <td><?= $tugas ?></td>
                            <td><?= $uts ?></td>
                            <td><?= $uas ?></td>
                            <td><?= number_format($nilaiAkhir, 2) ?></td>
                            <td><span class="grade-badge <?= $gradeClass ?>"><?= $grade ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="footer">
            Total SKS: <?= $totalSks ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>