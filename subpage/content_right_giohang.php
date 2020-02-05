<?php

$a = isset($_SESSION['giohang'])?$_SESSION['giohang']: array();
if (Count($a)==0)
{
	echo "Gio hang rong!";
	echo '<a href="index.php">Tiep tuc mua hang</a>';
	exit;
}

?>
<table border="1">
	<tr>
		<td>stt</td>
		<td>Ma sach</td>
		<td>Ten sach</td>
		<td>Gia</td>
		<td>Sluong</td>
		<td>Thanh tien</td>
		<td>Thao tac</td>
	</tr>
	<?php
	$n=0;
	$tong =0;
	foreach ($a as $masach => $soluong) 
	{ $n++; 
		$sql="select * from sach where masach =? ";
		$stm=$obj->prepare($sql);
		$stm->execute(array($masach));
		if ($stm->rowCount()==0) continue;
		$value= $stm->fetch();
		$thanhtien = $soluong*$value['gia'];
		$tong += $thanhtien;
		?>
		<tr>
		<td><?php echo $n ?></td>
		<td><?php echo $masach ?></td>
		<td><?php echo $value['tensach'] ?></td>
		<td><?php echo number_format($value['gia']) ?></td>
		<td>
			<form id='frm_<?php echo $masach ?>' action=giohang.php>
				<input type="hidden" name="masach" value='<?php echo $masach ?>'>
				<input type="hidden" name="action" value="sua">
			<input type="number" value="<?php echo $soluong ?>" name='soluong' min=0  class='w3'>
			</form>
			 </td>
		<td><?php echo number_format($thanhtien); ?> VND</td>
		<td> 
			<a href="#" onClick="FUpdateGH('<?php echo $masach ?>');">Sua</a> -
			<a href="giohang.php?masach=<?php echo $masach ?>&action=xoa">Xoa</a> </td>
	</tr>
		<?php	
	}
	?>
	<tr>
		<td colspan="5">Tong thanh tien</td>
		<td colspan="2">
			<?php echo number_format($tong); ?> VND
		</td>
	</tr>
</table>
<hr>
<a href="index.php">Tiep tuc mua hang</a>
<script type="text/javascript">
	function FUpdateGH(masach)
	{
		$("#frm_" + masach).submit();
	}
</script>