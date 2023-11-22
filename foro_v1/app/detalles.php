<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= detallesComentario($_REQUEST['comentario'])[0]?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= detallesComentario($_REQUEST['comentario'])[2]?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= detallesComentario($_REQUEST['comentario'])[1]?></td></tr>
</table>
</div>

