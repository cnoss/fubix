<?php if(!defined('KIRBY')) exit ?>

title: Team Overview (Container Template)
pages:
  build:
	template:
		- content--team-member
files: false
fields:
  info:
  	label: Team Overview (Container Template)
  	type: info
  	text: This template displays an overview of all team member subpages.
  	width: 1/2
  visible:
    label: Visible Data
    type: headline
  title:
    label: Title/ Headline
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

  layout:
    label: Design (only editable in your main language)
    type: headline
        	
  headline_position:
    label: Headline
    type: radiosingleton
    options:
      hide: hide
      text: show above text
      row: show above row
      subhead: show in subheader

  color_class:
    label: Background Color
    type: radiosingleton
    options:
      normal: normal
      bg-gray: gray
      
  layout_type:
    label: Size and aspect ratio
    type: radiosingleton
    options:
      layout-xsmall-square: very small, square images
      layout-small-square: small, square images
      layout-large-square: large, square images
      layout-xsmall-16zu9: very small, 16:9 images
      layout-small-16zu9: small, 16:9 images
      layout-large-16zu9: large, 16:9 images

