/*
 * Archivo Javascript principal de la aplicacion
 *
 * Desarrollado por Anderson Salas (contacto@andersonsalas.com.ve)
 * Repositorio en GitHub: https://github.com/andersonsalas/notepadMe
 *
 * -------------------------------------------------------------------------------------
 *
 *   notepadMe
 *   Copyright (C) 2016 Anderson Salas
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License along
 *   with this program; if not, write to the Free Software Foundation, Inc.,
 *   51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

var current_note  = null;
var modified_note = null;

function appResponsiveInterface(){
    $('.main-container').height(
        $(window).height() - 90
    );
    $('.main-container .col-derecha').height(
        $('.main-container').height()
    );
}

function loadEditor(id_nota){
    id_nota = typeof id_nota != 'undefined' ? id_nota : false;

    var url = '';
    var makeLoad = true;

    if(current_note === id_nota){
        if(modified_note != null){
            makeLoad = false;
        }
    } else {
        if(modified_note === true){
            if(confirm('¿Descartar cambios?') === false){
                makeLoad = false;
            }
        }
    }

    if(makeLoad){
        if(id_nota){
            current_note = id_nota;
            url = '/'+id_nota;
            $('.lista-notas a').removeClass('activa');
            $('.lista-notas [data-id='+id_nota+']').addClass('activa');
        } else {
            $('.lista-notas a').removeClass('activa');
            modified_note = null;
            current_note = null;
        }
        $('.col-derecha').load('editor'+url);
    }
}

function loadNoteList(){
    $.ajax({
        method  : "POST",
        url     : "lista",
    })
    .done(function( data ) {
        $('.lista-notas').prepend(data);
    });
}

$(document).ready(function(){
    appResponsiveInterface();
    loadNoteList();

    $('#nuevaNota').on('click',function(e){
        e.preventDefault();
        loadEditor();
    });
    $('.lista-notas').on('click','li > a',function(e){
        id_nota = $(this).attr('data-id');
        loadEditor(id_nota);
    });

});

$(window).on('resize',function(){
    appResponsiveInterface();
})