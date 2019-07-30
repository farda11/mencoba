
<html>
<head>
<title>Input Data sewa </title>
</head>

<body background="gambar/pkl.jpg">
<h1>Input Data sewa </h1>
<form name="sewa" method="post">
<table width="362" border="1">
  <tr>
    <th width="81" scope="row">No_sewa</th>
    <td width="265"><input name="No_sewa" type="text"></td>
  </tr>
  <tr>
    <th scope="row">No_ktp</th>
    <td><input name="No_ktp" type="text"></td>
  </tr>
  <tr>
    <th scope="row">kode_kamar</th>
    <td><textarea name="kode_kamar" cols="" rows=""></textarea></td>
  </tr>
   <th scope="row">tanggal_sewa</th>
    <td><textarea name="tanggal_sewa" cols="" rows=""></textarea></td>
  </tr>
  <tr>
    <th height="31" scope="row">&nbsp;</th>
    <td><input name="submit" type="submit" value="Simpan">
    <input name="reset" type="reset" value="Batal"></td>
  </tr>
</table>
</form>
<?php
mysql_connect("localhost","root","");
mysql_select_db("hotel");
if(isset($_POST['No_sewa'])and($_POST['No_ktp']) and ($_POST['kode_kamar'])and ($_POST['tanggal_sewa']) )
{
	$No_sewa=$_POST['No_sewa'];
	$No_ktp=$_POST['No_ktp'];
	$kode_kamar=$_POST['kode_kamar'];
	$tanggal_sewa=$_POST['tanggal_sewa'];
	$perintah_sql=("insert into sewa(No_sewa,No_ktp,kode_kamar,tanggal_sewa)
					value('$No_sewa','$No_ktp','$kode_kamar','$tanggal_sewa') ");
	$hasil=mysql_query($perintah_sql);
}
$sql=mysql_query("select * from sewa ORDER BY No_sewa asc");
echo"<br>";
echo"<h3>Data hotel</h3>";
echo"<table border=1>";
		echo"<tr>";
			echo"<td> No_sewa</td>";
			echo"<td> No_ktp </td>";
			echo"<td> kode_kamar </td>";
			echo"<td> tanggal_sewa </td>";
			echo"<td> Delete </td>";
			echo"<td> edit</td>";
		echo"</tr>";
while($data=mysql_fetch_array($sql))
{
		echo"<tr>";
			echo"<td>".$data['No_sewa']."</td>";
			echo"<td>".$data['No_ktp']."</td>";
			echo"<td>".$data['kode_kamar']."</td>";
			echo"<td>".$data['tanggal_sewa']."</td>";
			echo"<td><a href=input_sewa.php?hapus=".$data['No_sewa'].">Delete </a></td>";
			echo"<td><a href=edit_sewa.php?edit=".$data['No_sewa'].">edit </a></td>";
			echo"</tr>";
}
echo"</table>";
if(isset($_GET['hapus']))
	{
		$No_ktp=$_GET['hapus'];
		mysql_query("DELETE FROM sewa WHERE No_sewa=$No_sewa");
	}
?>

<a href="index.php" > Kembali </a>

</body>
</html>
