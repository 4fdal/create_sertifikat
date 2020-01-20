<?php 

require_once('MyLibraries/AddImageText.php');

function addSertifikat($nama, $jurusan, $dir){
    $nama = ucwords($nama);
    $jurusan = ucwords($jurusan);
    $dir = "ListSertifikat/{$dir}/{$nama}.jpg" ;

    $img = new AddImageText(__DIR__.'\Sertifikat\sertifikat.jpg');
    $img->setTextSize(120);
    $img->setTextImageCenter(0, 1110, $nama);
    $img->setTextSize(80);
    $img->setTextImageCenter(0, 1270, $jurusan);
    $img->getImage($dir);
}

if($_SERVER['REQUEST_METHOD'] = "POST"){
    $nama = $_POST["nama"];
    $jabatan = $_POST["jabatan"];
    $dir = $_POST["dir"];
    addSertifikat($nama, $jabatan, $dir);
    echo json_encode($_POST);
}