<?php
require('tfpdf.php');

$pdf = new tFPDF();
$pdf->AddPage();

// Add Arabic font
$pdf->AddFont('Amiri','','Amiri-Regular.ttf',true);
$pdf->SetFont('Amiri','',14);

// Fix RTL text (reverse string order)
function utf8_arabic($text) {
    return iconv('UTF-8', 'windows-1256', $text);
}

// Table header in Arabic
$header = ['الدواء', 'الجرعة', 'الكمية', 'ملاحظات'];
$widths = [50, 40, 30, 60]; 

// Draw header
foreach ($header as $i => $col) {
    $pdf->Cell($widths[$i], 10, utf8_arabic($col), 1, 0, 'C');
}
$pdf->Ln();

// Table rows (Arabic data)
$data = [
    ['باراسيتامول', '٥٠٠ مجم', '٣٠', 'يؤخذ بعد الأكل'],
    ['أموكسيسيلين', '٢٥٠ مجم', '٢٠', 'مرتين يومياً'],
    ['ايبوبروفين', '٢٠٠ مجم', '١٥', 'عند حدوث ألم']
];

foreach ($data as $row) {
    foreach ($row as $i => $cell) {
        $pdf->Cell($widths[$i], 10, utf8_arabic($cell), 1);
    }
    $pdf->Ln();
}

$pdf->Output('F', 'table_arabic.pdf');
echo "Arabic PDF generated!\n";
?>
