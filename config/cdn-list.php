<?php

// CDN js
$jsCDNList = array(
    'jquery' => 'https://code.jquery.com/jquery-3.7.0.min.js',
    'jQueryBootstrap' =>'https://code.jquery.com/jquery-3.2.1.slim.min.js',
    'bootstrap' => 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js',
    'bootstrap2' => 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js',
    'datatables' => 'https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js',

);

// CDN Hojas de Estilo
$cssCDNList = array(
    'bootstrap' => 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css',
    'FontAwesome' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
);

return array(
    'js' => $jsCDNList,
    'css' => $cssCDNList
);
?>
