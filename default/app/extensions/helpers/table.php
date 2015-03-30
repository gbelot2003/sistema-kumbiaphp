<?php
/**
* Helper Table
* @$headers => Array con los campos a mostrar, estos deben coincidir con la consulta
* @$query => Array de consulta sql
* @$atributes => opcional, agreagas los atributos de la tabla
*/

/**
 * @header => los valores que acepta son:
 * 'columna' = nombre de la columna en la consulta.
 * 'title' = Titluo que se desea imprimir en la cabezera de la tabla.
 * ejemp:
 * 'columna' => array('title' => 'nombre de la columna en tabla')
 * 'id' => array ('title' => "registro No.")
 *
 * 'url'(opcional) = url que se desea agregar a determinado campo.
 *
 * attr(opcional) = atributos del link, colocas class, rel etc.
 *
 *ejemp:
 *'id' => array ('title' => "registro No.", 'url' => 'registros/ver/', 'attr' => "class='edit' rel='group-1'").
 *
 */

class Table {

	public static function simple($headers, $query = NULL, $atributos = NULL)
	{
		$i = 1;
		?>
		<table <?php print $atributos ?>>
			<thead>
			<tr>
				<?php foreach($headers as $key => $value): ?>
					<th><?php print $value['title'] ?></th>
				<?php endforeach ?>
			</tr>
			</thead>
			<tbody>
			<?php foreach($query as $query): ?>

				<tr class="trTable <?php print $i++ ?>">
					<?php foreach($headers as $key => $value): ?>
						<?php if(!isset($value['url'])): ?>
							<td><span><?php print $query->$key ?></span></td>
						<?php else: ?>
							<td class="tdTable"><?php print html::link($value['url'].$query->id, $query->$key, $value['attr']) ?></td>
						<?php endif ?>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
			</tbody
		</table>
		<?php
	}
}