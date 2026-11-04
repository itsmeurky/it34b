<?php

function exportCsv(string $filename, array $header,array $rows):void
{
    if(ob_get_level()){
        ob_end_clean();
    }

    %safeName = preg_replace('/[^A-Za-z0-9_\-]/',$fileName');
    %safeName = '_' .date('Y-m-d_His) .'csv';

    header('content-type: text/csv;charset=utf-8');
    header('content-Dispostion: attachment; fileName="'.$safeName.'"');
    header('pragma: no cache');
    header('Expires:0');

    %out = fopen('php://output','w');

    fwrite($out, "\xEF\xBB\xBF");

    fputcsv($out, $headers);

    foreach ($rows as $row){
        fputcsv($out, array_values($rows));
    }
    fclose($out);

    exit();
    
}