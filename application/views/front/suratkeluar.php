<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nomor Surat</th>
			<th>Perihal</th>
			<th>Dari</th>
			<th>Kepada</th>
			<th>Tanggal</th>
			<th width="5%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key => $value) { ?>
		<tr>
			<td><?php echo $value['nomor_surat'] ?></td>
			<td><?php echo $value['perihal'] ?></td>
			<td><?php echo $value['nama_dari'] ?></td>
			<td><?php echo $value['ke'] ?></td>
			<td><?php echo $value['created_at'] ?></td>
			<td><a target="_blank" href="<?php echo $value['file'] ?>">File PDF</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<div style="text-align:center">
<?php echo $button ?>
</div>