<?php
if (!empty($_REQUEST['nama_depan'])) {
    $nm_depan = $_REQUEST['nama_depan'];
}
if (!empty($_REQUEST['nama_belakang'])) {
    $nm_belakang = $_REQUEST['nama_belakang'];
}

if (isset($nm_depan) && isset($nm_belakang)) {
    echo $nm_depan + $nm_belakang;
}
