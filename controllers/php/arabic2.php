<?php
require __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'default_font' => 'dejavusans',
    'directionality' => 'rtl' // set RTL globally
]);

$html = '
<style>
    body { font-family: dejavusans; }
    p, h2, h3, ul, table { direction: rtl; text-align: right; }
    table { width:100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border:1px solid black; padding:6px; text-align:center; }
    h2 { margin-top:20px; font-size:14pt; }
</style>

<p><b>اسم العيادة:</b> </p>
<p><b>التاريخ:</b>    </p>
<p><b>اسم المريض:</b>   </p>
<p><b>العمر:</b> </p>

<h2 style="text-align:right; color: #9b28a1ff;">● الوصفة الطبية</h2>
<table>
    <tr>
        <th>الدواء</th>
        <th>الجرعة</th>
        <th>عدد المرات</th>
        <th>المدة</th>
    </tr>
    <tr>
        <td>       </td>
        <td>    </td>
        <td>    </td>
        <td>     </td>
    </tr>
    <tr>
        <td>   </td>
        <td>   </td>
        <td>   </td>
        <td>   </td>
    </tr>
</table>

<h2 style="text-align:right; color: #9b28a1ff;">● التحاليل / الفحوصات المطلوبة</h2>
<ul style="text-align:right;">
    <li>  </li>
    <li> </li>
    <li> </li>
</ul>

<h2 style="text-align:right; color: #9b28a1ff;">● ملاحظات الطبيب</h2>
<p>             </p>

<br><br>
<p style="text-align:left;">اسم الطبيب: __________</p>
<p style="text-align:left;">التوقيع: ___________</p>
';

$mpdf->WriteHTML($html);
$mpdf->Output('prescription_template2.pdf', 'F'); // saves to file
echo "✅ Arabic Prescription PDF generated: prescription_template2.pdf\n";
