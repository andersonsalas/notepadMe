/*
 * Funciones del editor visual
 *
 * Desarrollado por Anderson Salas (contacto@andersonsalas.com.ve)
 * Repositorio en GitHub: https://github.com/andersonsalas/notepadMe
 *
 * -------------------------------------------------------------------------------------
 *
 *   notepadMe!
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

function getEditorToolbarHeight(){
    var alturaToolbar = $('.mce-toolbar-grp').height();
    var alturaTitulo  = $('#tituloNotaContainer').height();
    if(alturaToolbar == null){
        // FIXME: Buscar una forma de no requerir este numero
        alturaToolbar = 32;
    }
    return alturaToolbar + alturaTitulo;
}

function getEditorContainerHeight(){
    return (
        $('.col-derecha').height()
        - $('.opcionesNota').height()
        - getEditorToolbarHeight()
        - 5 // FIXME: Buscar una forma de no requerir este numero
    );

}
function getEditorContent(){
    return tinymce.get('editor').getContent();
}
function getEditorTitle(){
    return $('#tituloNota').val();
}

function saveNote(){
    var titulo     = getEditorTitle();
    var contenido  = getEditorContent();
    var saveUrl;
    if(current_note === null){
        saveUrl = 'guardar';
    } else {
        saveUrl = 'guardar/'+current_note;
    }
    $.ajax({
        method  : "POST",
        url     : saveUrl,
        data    : {
            'titulo'   : titulo,
            'contenido': contenido
        }
    })
    .done(function( data ) {
        $('.lista-notas').prepend(data);
    });
}

function editorResize(){
    $('.editorContainer').width( $('#tituloNotaContainer').width() - 1);
    $('#editor_ifr').height( getEditorContainerHeight() );
}

function editorStart(){
    $('.col-derecha').css('opacity',0);
    tinymce.init(
        {
            selector    :'#editor',
            theme       : 'modern',
            menubar     : false,
            statusbar   : false,
            toolbar1    : 'insertfile undo redo paste | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            content_css : 'assets/css/editor_internal.css',
            setup: function(ed) {
                // Animacion de entrada:
                ed.on('init', function() {
                    setTimeout(function(){
                        editorResize();
                    },300);
                    setTimeout(function(){
                        $('.col-derecha').animate({
                                opacity:1,
                        },150);
                    },400);
                });
                modified_note = false;
                ed.on('change keyup', function() {
                    modified_note = true;
                });
            }
        }
    );
}

$(window).on('resize',function(){
    setTimeout(function(){
        editorResize();
    },200)
});

$(document).ready(function(){
    editorStart();
    $('#editorGuardar').on('click',function(e){
        e.preventDefault();
        saveNote();
    });
});



