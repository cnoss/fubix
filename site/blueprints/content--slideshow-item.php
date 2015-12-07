<?php if(!defined('KIRBY')) exit ?>

title: Slide (Content Template)
pages: false
files: 
	sortable: true
fields:
  info:
  	label: Slide (Content Template)
  	type: info
  	text: This template displays a single slide with caption text.
  	width: 1/2
  visible:
    label: Visible Data
    type: headline
  title:
    label: Title/ Headline
    type:  text  
  text:
  	label: Content
  	type: textarea	
invisible:
    label: Invisible Data (only editable in your main language)
    type: headline
  autor:
  	label: Autor
  	type: textsingleton
  	icon: user
  	width: 1/2
  date:
    label: Date
    type: datesingleton
    format: YYYY-MM-DD
    width: 1/2