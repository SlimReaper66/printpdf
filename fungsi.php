<?php
//membuat koneksi ke database mysql
$koneksi = mysqli_connect('localhost', 'root', '', 'a122106618');

function encryptid($id)
{
    $enc = base64_encode(rand() * strtotime(date("Y-m-d H:i.s"))."-".$id);
    return $enc;
}

function decryptid($string)
{
    $kode = base64_decode($string);
    $id = explode("-",$kode);
    if(count($id) > 1)
    {
        return $id[1];
    }
    else
    {
        return 0;
    }
}

function search($tipe,$key=null)
{
    $sql="select *from ".$tipe;
    if(!is_null($key))
    {
        $sql.=" where ".$key;
    }

    $hasil=mysqli_query($GLOBALS['koneksi'],$sql) or die(mysql_error($GLOBALS['koneksi']));
    return $hasil;
}

function generatepdf($size="A4", $orientation="Portrait",$html=null,$filename="doc")
    {
        require_once __DIR__ . '/vendor/autoload.php';

    $pdf = new \Dompdf\Dompdf();

    $pdf->loadHtml($html);
    $pdf->setPaper($size,$orientation); // ukuran dan orientation
    $pdf->render();
    $pdf->stream($filename.".pdf",array("Attachment"=>FALSE));
    }
?>

