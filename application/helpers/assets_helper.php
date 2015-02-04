<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('css_url')){

	function css_url($nom){
		
		$link = base_url().'assets/css/'.$nom.'.css';

		 return "<link rel='stylesheet' href='".$link."'> ";
	}
}

if ( ! function_exists('js_url')){

	function js_url($nom){

		$link = base_url().'assets/javascript/'.$nom.'.js';
		
		return "<script type='text/javascript' src='".$link."'> </script>";
	}
}

if ( ! function_exists('img_url')){
	
	function img_url($nom,$ext){
		
		return base_url().'assets/images/'.$nom.'.'.$ext;
	}
}

if ( ! function_exists('img')){
	
	function img($nom, $ext, $alt = ''){
		
		return "<img src ='".img_url($nom,$ext)."' alt='".$alt."' />";
	}
}

if ( ! function_exists('theme_url')){
	
	function theme_url($nom){
		
		return base_url().'themes/'.$nom;
	}
}