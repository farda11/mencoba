<html>
<head>
<title>Input Data penyewa </title>
</head>

<body>
<h1>Input Data penyewa </h1>
<form name="penyewa" method="post">
<table width="362" border="1">
  <tr>
    <th width="81" scope="row">No_ktp</th>
    <td width="265"><input name="No_ktp" type="text"></td>
  </tr>
  <tr>
    <th scope="row">Nama</th>
    <td><input name="Nama" type="text"></td>
  </tr>
  <tr>
    <th scope="row">Alamat</th>
    <td><textarea name="Alamat" cols="" rows=""></textarea></td>
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
if(isset($_POST['No_ktp'])and($_POST['Nama']) and ($_POST['Alamat']))
{
	$No_ktp=$_POST['No_ktp'];
	$Nama=$_POST['Nama'];
	$Alamat=$_POST['Alamat'];
	$perintah_sql=("insert into penyewa(No_ktp,Nama,Alamat)
					value('$No_ktp','$Nama','$Alamat') ");
	$hasil=mysql_query($perintah_sql);
}
$sql=mysql_query("select * from penyewa ORDER BY No_ktp asc");
echo"<br>";
echo"<h3>Data hotel</h3>";
echo"<table border=1>";
		echo"<tr>";
			echo"<td> No_ktp </td>";
			echo"<td> Nama </td>";
			echo"<td> Alamat </td>";
			echo"<td> Delete </td>";
			echo"<td> edit</td>";
		echo"</tr>";
while($data=mysql_fetch_array($sql))
{
		echo"<tr>";
			echo"<td>".$data['No_ktp']."</td>";
			echo"<td>".$data['Nama']."</td>";
			echo"<td>".$data['Alamat']."</td>";
			echo"<td><a href=input_penyewa.php?hapus=".$data['No_ktp'].">Delete </a></td>";
			echo"<td><a href=edit_pyw.php?edit=".$data['No_ktp'].">edit </a></td>";
			echo"</tr>";
}
echo"</table>";
if(isset($_GET['hapus']))
	{
		$No_ktp=$_GET['hapus'];
		mysql_query("DELETE FROM penyewa WHERE No_ktp=$No_ktp");
	}
?>

<a href="index.php" > Kembali </a>

</body>
</html>
