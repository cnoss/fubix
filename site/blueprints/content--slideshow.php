<?php if(!defined('KIRBY')) exit ?>

title: Slideshow (Content & Container Template)
pages:
  template:
    - content--slideshow-item
  build:
    - title: Slide 1
      uid: slide-1
      num: 1
      template: content--slideshow-item
files:
	sortable: true
fields:
  info:
  	label: Slideshow (Content & Container Template)
  	type: info
  	text: This template displays a slideshow. If you only want to show images without caption text, you can upload the images into the "Files" area. If you need captions, you have to create a subpage for each slide.
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

  layout_switcher:
    label: Layout
    type: layoutswitchersingleton

  behavior_type:
    label: Behavior
    type: radiosingleton
    options:
      standard: standard
      accordion-closed: klappbar, zugeklappt
      accordion-opened: klappbar, offen
      
  color_class:
    label: Background Color
    type: radiosingleton
    options:
      normal: normal
      bg-gray: gray


  teaser_style:
    label: Teaser Adjustment (only editable in your main language)
    type: headline
    
  home:
    label: Visible on homepage
    type: radiosingleton
    width: 1/2
    options:
      false: Nein
      true: Ja
      
   display_data:
     label: visible data
     type: checkboxessingleton
     default:
    	- image
        - headline    	
     options:
        headline: Headline
        image: Bild
        content: Content
        link: Verweis auf Folgeseite
      
	teasertext:
	    label: Teasertext (optional)
		type:  textarea
		info: 
			de: Wenn dieses nicht Feld ausgefüllt wird, dann wird der Text im Feld "Content" als Teasertext verwendet.
			en: If this field is empty, the text of the field "Content" is used.
	
	select_image:
      label:	Teaserbild
      type: 	selectorsingleton
      mode:  single
      types:
        - image