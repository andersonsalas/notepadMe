<?php
/*
 * Funciones para assets
 * -------------------------------------------------------------------------------------
 */

function img_dir($archivo = '')
{
    return base_url().'assets/img/'.$archivo;
}

function css_dir($archivo = "", $tag = false)
{
    return ($tag ? '<link rel="stylesheet" href="' : '').base_url().'assets/css/'.$archivo.($tag ? '" />' : '');
}

function js_dir($archivo = '', $tag = false)
{
    return ($tag ? '<script src="' : '').base_url().'assets/js/'.$archivo.($tag ? '"></script>' : '');
}

