<?php if(!defined('KIRBY')) exit ?>

title: Video (Content Template)
pages: false
files: true
fields:
  info:
  	label: Video (Content Template)
  	type: info
  	text: This template displays a video.
  	width: 1/2
  visible:
    label: Sichtbare Angaben
    type: headline
  title:
    label: Title/ Headline
    type:  text
  video:
    label: Video
    type: text
    help: 
      de: Vimeo oder YouTube Video ID eintragen, e.g. 102104411
      en: Fill in vimeo or YouTube Video ID, z.B. 102104411
  provider:
    label: Provider
    type: radiosingleton
    options:
      vimeo: Vimeo
      youtube: YouTube
  text:
  	label: Text (optional)
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
      subhead: show in subheader
      row: show in row above

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
      bg-gray: grau


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