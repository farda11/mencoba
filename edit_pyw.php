<?php
mysql_connect("localhost","root","");
mysql_select_db("hotel");

$No_ktp=$_GET['edit'];
$sql_1=mysql_query("SELECT * FROM penyewa WHERE No_ktp=$No_ktp");
$data_1=mysql_fetch_array($sql_1)
?>
<html>
<head>
<title>form Edit Data </title>
</head>
<body>
<h1>Edit Data penyewa </h1>
<form method="post" name="penyewa">
<table width="362" border=1>
	<tr>
    <input name="No_ktp" type="hidden" value= <?php echo $data_1['No_ktp'] ?> >
     <th width="82" scope="row">No_ktp</th>
    <td width="252"><input name="No_ktp" type="text" value= <?php echo $data_1['No_ktp'] ?> >
    </td>
    </tr>
    <tr>
    <th width="82" scope="row">Nama</th>
    <td width="252"><input name="Nama" type="text" value= <?php echo $data_1['Nama'] ?> > 
    </td>
  </tr>
  <tr>
    <th scope="row">Alamat</th>
    <td><textarea name="Alamat" cols="" rows=""><?php echo $data_1['Alamat'] ?></textarea>
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
        $perintah_sql="UPDATE penyewa SET
		                       No_ktp         = '$_POST[No_ktp]',
							   Nama           = '$_POST[Nama]',
							   Alamat         = '$_POST[Alamat]',
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
<a href="input_penyewa.php" > Kembali </a>
</body>
</html>