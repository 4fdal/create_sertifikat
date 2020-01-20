<?php 

require_once('MyLibraries/AddImageText.php');

function addSertifikat($nama, $jurusan){
    $nama = ucwords($nama);
    $jurusan = ucwords($jurusan);
    $dir = "ListSertifikat/{$nama}.jpg" ;

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
    addSertifikat($nama, $jabatan);
    echo json_encode($_POST);
}

function struktur(){
    $data = "AFDAL:KOORDINATOR PUBLIKASI DAN DOKUMENTASI,
    SELVILA YOLANDA:STAFF KOORDINATOR PUBLIKASI DAN DOKUMENTASI,
    RIFA ZURMAERA:STAFF KOORDINATOR PUBLIKASI DAN DOKUMENTASI,
    VIVI RAHMAWATI:SEKRETARIS 1,
    HAFIZA AULIA:SEKRETARIS UMUM,
    ERMAN:KOORDINATOR PERLENGKAPAN,
    RIRI SILVANI DWI PUTRI: BENDAHARA 1,
    YOVI REZKI PUTRA: KETUA UMUM JAWARA PNP,
    ILHAM PRASETIYA:WAKIL KETUA UMUM JAWARA PNP,
    MUHAMAD AZRI : STAFF KOORDINATOR PSDM,
    RIZKA HIDAYAT : BENDAHARA UMUM, 
    ANWADI LAMARCHTA : KOORDINATOR HUMAS
    ZIKRI : STAFF KOORDINATOR HUMAS";
    $data = explode(",", $data);
    foreach ($data as $key => $value) {
        $value = explode(":", $value);
        addSertifikat($value[0], $value[1]);
    }
}