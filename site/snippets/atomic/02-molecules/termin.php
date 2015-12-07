<!-- Molecule: Termin -->
<tr class="termin">
	<td><?php echo date(l::get("date-format"), strtotime($content->datum())); ?></td><td><?php echo $content->start(); ?> – <?php echo $content->end(); ?></td>
</tr>