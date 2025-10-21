<?php
require __DIR__ . '/vendor/autoload.php';

echo "Creating detailed font test PDF...\n";

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4'
]);

// Sample Arabic text for testing
$sampleTexts = [
    'title' => 'وصفة طبية - Medical Prescription',
    'header' => 'معلومات العيادة والمريض',
    'medicine' => 'باراسيتامول - أموكسيسيلين - ايبوبروفين',
    'dosage' => '٥٠٠ مجم - ٢٥٠ مجم - ٤٠٠ مجم',
    'instructions' => 'ثلاث مرات يومياً - مرتين يومياً - عند الحاجة',
    'notes' => 'يؤخذ بعد الأكل مع كوب من الماء'
];

$fonts = [
    'dejavusans' => 'DejaVu Sans (Clean & Modern)',
    'dejavuserif' => 'DejaVu Serif (Traditional)',
    'arial' => 'Arial (Standard Sans-serif)',
    'times' => 'Times New Roman (Classic Serif)'
];

$html = '
<style>
    .font-test { 
        margin: 15px 0; 
        border: 2px solid #333; 
        padding: 15px; 
        page-break-inside: avoid;
    }
    .font-name { 
        background: #f0f0f0; 
        padding: 5px; 
        margin-bottom: 10px; 
        text-align: center;
        font-weight: bold;
    }
    .arabic-text { 
        text-align: right; 
        line-height: 1.6; 
    }
    table { 
        width: 100%; 
        border-collapse: collapse; 
        margin: 10px 0;
    }
    th, td { 
        border: 1px solid #666; 
        padding: 8px; 
        text-align: center;
    }
    th { background: #e0e0e0; }
</style>

<h1 style="text-align:center; color: #333;">🔤 Arabic Font Comparison Test</h1>
<p style="text-align:center; margin-bottom: 30px;">Compare how different fonts render Arabic text</p>
';

foreach ($fonts as $fontName => $description) {
    $html .= "
    <div class='font-test'>
        <div class='font-name'>$description ($fontName)</div>
        <div style='font-family: $fontName;'>
            
            <!-- Title Test -->
            <h2 class='arabic-text' style='color: #2c5aa0;'>{$sampleTexts['title']}</h2>
            
            <!-- Paragraph Test -->
            <h3 class='arabic-text'>{$sampleTexts['header']}</h3>
            <p class='arabic-text'>اسم المريض: أحمد محمد علي</p>
            <p class='arabic-text'>العمر: ٣٥ سنة</p>
            <p class='arabic-text'>التاريخ: ٢٠٢٥/١٠/٠٣</p>
            
            <!-- Table Test -->
            <table style='font-family: $fontName;'>
                <tr>
                    <th>الدواء</th>
                    <th>الجرعة</th>
                    <th>عدد المرات</th>
                    <th>ملاحظات</th>
                </tr>
                <tr>
                    <td>باراسيتامول</td>
                    <td>٥٠٠ مجم</td>
                    <td>ثلاث مرات يومياً</td>
                    <td>بعد الأكل</td>
                </tr>
                <tr>
                    <td>أموكسيسيلين</td>
                    <td>٢٥٠ مجم</td>
                    <td>مرتين يومياً</td>
                    <td>على معدة فارغة</td>
                </tr>
                <tr>
                    <td>فيتامين د</td>
                    <td>١٠٠٠ وحدة</td>
                    <td>مرة واحدة يومياً</td>
                    <td>مع وجبة الإفطار</td>
                </tr>
            </table>
            
            <!-- Instructions Test -->
            <div class='arabic-text' style='background: #f9f9f9; padding: 10px; margin: 10px 0;'>
                <strong>تعليمات مهمة:</strong><br>
                {$sampleTexts['notes']}<br>
                تجنب التعرض لأشعة الشمس المباشرة<br>
                استشر الطبيب في حالة ظهور أعراض جانبية
            </div>
            
            <!-- Numbers Test -->
            <p class='arabic-text'><strong>الأرقام:</strong> ١٢٣٤٥٦٧٨٩٠ - 1234567890</p>
            
        </div>
    </div>";
    
    // Add page break except for last font
    if ($fontName !== 'times') {
        $html .= '<pagebreak />';
    }
}

$html .= '
<div style="text-align:center; margin-top: 30px; padding: 20px; background: #f0f0f0;">
    <h3>📋 Recommendation</h3>
    <p><strong>DejaVu Sans:</strong> Most reliable for Arabic text, clean and modern</p>
    <p><strong>DejaVu Serif:</strong> Good for formal documents, traditional look</p>
    <p><strong>Arial:</strong> Standard choice, widely compatible</p>
    <p><strong>Times:</strong> Classic serif, good for official documents</p>
</div>';

$mpdf->WriteHTML($html);
$mpdf->Output('detailed_font_test.pdf', 'F');

echo "✅ Detailed font test PDF created: detailed_font_test.pdf\n";
echo "📄 Files created:\n";
echo "  - font_comparison.pdf (simple comparison)\n";
echo "  - detailed_font_test.pdf (comprehensive test)\n";
?>