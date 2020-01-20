<?php

class AddImageText {

  public $font = __DIR__. '\..\Font\GOTHIC.TTF' ;
  private $img ;
  private $color ;
  private $colorBlack ;
  private $size = 12 ;

  public function __construct($img){
    $this->img = imagecreatefromjpeg($img) ;
    $this->color = imagecolorallocate($this->img, 0, 0, 0);
  }

  public function setTextColorWhite(){
    $this->color = imagecolorallocate($this->img, 255, 255, 255);
  }

  public function setTextColor($color){
    $color = explode(',',$color);
    $this->color = imagecolorallocate($this->img, $color[0], $color[1], $color[2]);
  }

  public function setTextFont($nmFont){
    $this->font = __DIR__ . '\..\Font\\'.$nmFont ;
  }

  public function setTextSize($size){
    $this->size = $size ;
  }

  public function setTextImage($x, $y, $text){
    return imagettftext($this->img, $this->size, 0, $x, $y, $this->color, $this->font, $text );
  }

  public function setTextImageCenter($x=0, $y=0, $text){
    $xi = ImageSX($this->img); 
    $yi = ImageSY($this->img); 
    $box = imageftbbox($this->size, 0, $this->font, $text);
    $xr = abs(max($box[2], $box[4])); 
    $yr = abs(max($box[5], $box[7]));
    $x = $x == 0 ? intval(($xi - $xr) / 2) : $x;
    $y = $y == 0 ? intval(($yi + $yr) / 2) : $y;
    $this->setTextImage($x, $y, $text);
  }

  public function copyImg($array_conf){
    $pasteImg = imagecreatefromjpeg($array_conf['image']);
    if(isset($array_conf['img-scale'])){
      $pasteImg = imagescale($pasteImg, $array_conf['img-scale']['width'], $array_conf['img-scale']['height']);
    }
    return imagecopymerge(
      $this->img,
      $pasteImg,
      $array_conf['position'][0],
      $array_conf['position'][1],
      0, 0,
      imagesx($pasteImg),
      imagesy($pasteImg),
      isset($array_conf['opacity']) ? $array_conf['opacity'] : 100
    );
  }

  public function getImage($file=null){
    header('Content-type: image/jpeg');
    if($file != null) {
      imagejpeg($this->img,$file);
    } else {
      imagejpeg($this->img);
    }
    imagedestroy($this->img);
  }

}


// $img = new EditImageKta('../images/depan.jpg');
// $img->setTextSize(100);
// $img->setTextImage(200,200,"afdal");
// $img->setTextColor('192,168,10,1');
// $img->setTextImage(200,400,"1701081017");
// $img->copyImg([
//   'image' => '../images/afdal.jpg',
//   'position' => [400,500],
//   'opacity' => 100,
//   'img-scale' => [
//     'width' => 100,
//     'height' => 100,
//   ]
// ]);
// $img->getImage();


 ?>
