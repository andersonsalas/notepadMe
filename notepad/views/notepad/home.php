<div class="container main-container panel panel-default">
    <div class="row panel-body">
        <!-- Columna izquierda -->
        <div class="col-sm-3 col-xs-6 col-izquierda">
            <a href="#" id="nuevaNota" class="btn btn-default btn-block">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Nueva nota
            </a>
            <hr />
            <!-- Lista de notas -->
            <div class="lista-notas-container">
                <ul class="lista-notas list-unstyled"></ul>
            </div>
        </div>
        <!-- Columna derecha -->
        <div class="col-sm-9 col-xs-6 col-derecha">
            <style>
                .col-derecha{
                    background: url('<?= img_dir("notepadMe_logo.png");?>') center center no-repeat;
                }

            </style>

        </div>
    </div>
</div>
