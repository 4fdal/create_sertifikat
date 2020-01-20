<?php 

require_once('MyLibraries/AddImageText.php');

function addSertifikat($nama, $jurusan){
    $nama = ucwords($nama);
    $jurusan = ucwords($jurusan);
    $dir = "ListSertifikat\{$nama}.jpg" ;

    $img = new AddImageText(__DIR__.'\Sertifikat\sertifikat.jpg');
    $img->setTextImageCenter(0, 1200, $nama);
    $img->setTextImageCenter(0, 1100, $jurusan);
    $img->getImage($dir);
}

addSertifikat("afdal", "data");