<html>
<head>
<title>Input Data kamar </title>
</head>

<body>
<h1>Input Data kamar </h1>
<form name="kamar" method="post">
<table width="362" border="1">
  <tr>
    <th width="81" scope="row">kode_kamar</th>
    <td width="265"><input name="kode_kamar" type="text"></td>
  </tr>
  <tr>
    <th scope="row">nama_kamar</th>
    <td><input name="nama_kamar" type="text"></td>
  </tr>
  <tr>
    <th scope="row">ukuran</th>
    <td><textarea name="ukuran" cols="" rows=""></textarea></td>
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
mysql_select_db("Hotel");
if(isset($_POST['kode_kamar'])and($_POST['nama_kamar']) and ($_POST['ukuran']))
{
	$kode_kamar=$_POST['kode_kamar'];
	$nama_kamar=$_POST['nama_kamar'];
	$ukuran=$_POST['ukuran'];
	$perintah_sql=("insert into kamar(kode_kamar,nama_kamar,ukuran)
					value('$kode_kamar','$nama_kamar','$ukuran') ");
	$hasil=mysql_query($perintah_sql);
}
$sql=mysql_query("select * from kamar ORDER BY kode_kamar asc");
echo"<br>";
echo"<h3>Data kamar</h3>";
echo"<table border=1>";
		echo"<tr>";
			echo"<td> kode_kamar </td>";
			echo"<td> nama_kamar </td>";
			echo"<td> ukuran </td>";
			echo"<td> Delete </td>";
			echo"<td> edit</td>";
		echo"</tr>";
while($data=mysql_fetch_array($sql))
{
		echo"<tr>";
			echo"<td>".$data['kode_kamar']."</td>";
			echo"<td>".$data['nama_kamar']."</td>";
			echo"<td>".$data['ukuran']."</td>";
			echo"<td><a href=input_kamar.php?hapus=".$data['kode_kamar'].">Delete </a></td>";
			echo"<td><a href=edit_kamar.php?edit=".$data['kode_kamar'].">edit </a></td>";
			echo"</tr>";
}
echo"</table>";
if(isset($_GET['hapus']))
	{
		$kode_kamar=$_GET['hapus'];
		mysql_query("DELETE FROM kamar WHERE kode_kamar=$kode_kamar");
	}
?>

<a href="index.php" > Kembali </a>

</body>
</html>
