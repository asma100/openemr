<?php
require __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'default_font' => 'dejavuserif' // Arial (Standard sans-serif)
]);

$html = '
<p style="text-align:right;">:اسم العيادة  </p>
<p style="text-align:right;">:التاريخ  </p>
<p style="text-align:right;">:اسم المريض  </p>
<p style="text-align:right;">:العمر  </p>
<p style="text-align:right;">:وصفة طبية  </p>
<table border="1" style="width:100%; border-collapse: collapse; text-align:center;">
    <tr>
        <th>الدواء</th>
        <th>الجرعة</th>
        <th>عدد المرات</th>
        <th>المدة</th>
    </tr>
    <tr>
        <td> - </td>
        <td>- </td>
        <td> -</td>
        <td> - </td>
    </tr>
    <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
    </tr>
</table>
<h2 style="text-align:right; co">التحاليل / الفحوصات المطلوبة</h2>
<ul style="text-align:right;">
    <li>  </li>
    <li> </li>
    <li>  </li>
</ul>
<p style="text-align:right;">ملاحظات الطبيب</p>
<h3 style="text-align:left; margin: 50px;">   اسم الطبيب</h3>
<h3 style="text-align:left;">   التوقيع</h3>
';

$mpdf->WriteHTML($html);
$mpdf->Output('arabic_table5.pdf', 'F'); // saves to file
echo "✅ Arabic PDF generated: arabic_table5.pdf\n";
