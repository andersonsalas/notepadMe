<!-- Assets del editor -->
<?= js_dir('tinymce/tinymce.min.js', TRUE);?>
<?= js_dir('editor.js', TRUE);?>
<?= css_dir('editor_external.css', TRUE);?>

<!-- Titulo de la nota -->
<div class="row">
    <div class="col-md-12" id="tituloNotaContainer">
        <input type="text" id="tituloNota" class="form-control" placeholder="Escriba el título de la nota" <?= isset($nota) ? 'value="'.$nota->titulo.'"' : '' ;?>/>
    </div>
</div>

<!-- Contenedor de TinyMCE -->
<div class="editorContainer">
    <textarea id="editor"><?= isset($nota) ? $nota->contenido : '' ;?></textarea>
</div>

<!-- Opciones del editor -->
<div class="row opcionesNota">
    <div class="col-md-12">
        <div class="well no-mb text-right">
            <a href="#" id="editorBorrar" class="btn btn-default">Borrar</a>&nbsp;
            <a href="#" id="editorGuardar" class="btn btn-primary">Guardar</a>
        </div>
    </div>
</div>


