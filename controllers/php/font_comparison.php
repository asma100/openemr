<?php
require __DIR__ . '/vendor/autoload.php';

// Available fonts in mPDF that support Arabic
$fonts = [
    'dejavusans' => 'DejaVu Sans (Clean, Modern)',
    'dejavuserif' => 'DejaVu Serif (Traditional with serifs)',
    'arial' => 'Arial (Standard sans-serif)',
    'times' => 'Times (Traditional serif)'
];

echo "Creating font comparison PDF...\n";

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4'
]);

$html = '<h1 style="text-align:center;">Arabic Font Comparison</h1>';

foreach ($fonts as $fontName => $description) {
    $html .= "
    <div style='margin: 20px 0; border: 1px solid #ccc; padding: 10px;'>
        <h3>$description ($fontName)</h3>
        <div style='font-family: $fontName; font-size: 16px;'>
            <p style='text-align:right;'>النص العربي - هذا مثال على الخط العربي</p>
            <p style='text-align:right;'>باراسيتامول - دواء مسكن للألم</p>
            <table border='1' style='width:100%; border-collapse: collapse; text-align:center; font-size: 14px;'>
                <tr><th>الدواء</th><th>الجرعة</th><th>المدة</th></tr>
                <tr><td>أموكسيسيلين</td><td>٢٥٠ مجم</td><td>أسبوع</td></tr>
            </table>
        </div>
    </div>";
}

$mpdf->WriteHTML($html);
$mpdf->Output('font_comparison.pdf', 'F');
echo "✅ Font comparison PDF created: font_comparison.pdf\n";
echo "\nAvailable fonts:\n";
foreach ($fonts as $fontName => $description) {
    echo "- $fontName: $description\n";
}
?>