<?php
mysql_connect("localhost","root","");
mysql_select_db("hotel");

$No_ktp=$_GET['edit'];
$sql_1=mysql_query("SELECT * FROM penyewa WHERE kode_kamar=$kode_kamar");
$data_1=mysql_fetch_array($sql_1)
?>
<html>
<head>
<title>form Edit Data </title>
</head>
<body>
<h1>Edit Data kamar </h1>
<form method="post" name="kamar">
<table width="362" border=1>
	<tr>
    <input name="kode_kamar" type="hidden" value= <?php echo $data_1['kode_kamar'] ?> >
     <th width="82" scope="row">kode_kamar</th>
    <td width="252"><input name="kode_kamar" type="text" value= <?php echo $data_1['kode_kamar'] ?> >
    </td>
    </tr>
    <tr>
    <th width="82" scope="row">nama_kamar</th>
    <td width="252"><input name="nama_kamar" type="text" value= <?php echo $data_1['nama_kamar'] ?> > 
    </td>
  </tr>
  <tr>
    <th scope="row">ukuran</th>
    <td><textarea name="ukuran" cols="" rows=""><?php echo $data_1['ukuran'] ?></textarea>
    </td>
  </tr>
  <tr>
    <th height="31" scope="row">&nbsp;</th>
    <td>
         <input name="submit" type="submit" value="Update">
         <input name="reset" type="reset" value="Batal">
    </td>
  </tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{
        $perintah_sql="UPDATE kamar SET
		                       kode_kamar         = '$_POST[kode_kamar]',
							   Nama           = '$_POST[nama_kamar]',
							   Alamat         = '$_POST[ukuran]',
							   WHERE No_ktp   = '$_POST[No_ktp]' ";
	    if($perintah_sql==true)
		{
		     mysql_query($perintah_sql);
			 echo "OK";
		}
		else
		{
		     echo "Gagal";
		}
}

?>
<a href="input_kamar.php" > Kembali </a>
</body>
</html>