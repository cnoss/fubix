<?php if(!defined('KIRBY')) exit ?>

title: Big Header Image (Content Template)
pages: false
files: 
	sortable: true
fields:
  info:
  	label: Big Header Image (Content Template)
  	type: info
  	text: This snippet provides an image or slideshow that fills the complete viewport.
  	width: 1/2
  visible:
    label: Visible Data
    type: headline
  title:
    label: Title
    type:  text  
  hide-in-lang:
    label: Content in this language should be…
    type: radio
    width: 1/2
    default: false
    options: 
    	false: visible
    	true: invisible
  text:
  	label: Content
  	type: textarea
  columns:
    label: Text Columns
    type: columnstepper 
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
    
  container_class:
  	type: hidden
  	default: container-fluid

  layout:
    label: Design (only editable in your main language)
    type: headline
        	
  headline_position:
    label: Headline
    type: radiosingleton
    options:
      hide: hide
      text: show above text
      subhead: show in subheader
      row: show in row above

  layout_switcher:
    label: Layout
    type: layoutswitchersingleton
      
  image_crop:
    label: Image Crop
    help: The image has to be cropped for some applications. Please choose the most important part of the image, that should be visible after cropping.
    type: radiosingleton
    options:
      top: top
      middle: middle
      bottom: bottom