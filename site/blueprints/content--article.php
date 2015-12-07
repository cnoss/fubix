<?php if(!defined('KIRBY')) exit ?>

title: Article (Content Template)
pages: false
files: 
	sortable: true
fields:
  info:
  	label: Article (Content Template)
  	type: info
  	text: This templates shows a single article.
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
      subhead: display in subheader
      replace_image_with_headline: replace images width headline
      row: show in row above
      
  layout_switcher:
    label: Layout
    type: layoutswitchersingleton
    
  behavior_type:
    label: Behavior
    type: radiosingleton
    options:
      standard: standard
      accordion-closed: accordion, closed
      accordion-opened: accordion, opened

  color_class:
    label: Background Color
    type: radiosingleton
    options:
      normal: normal
      bg-gray: gray

  teaser_style:
    label: Teaser Adjustment
    type: headline

  home:
    label: Teaser on homepage
    type: checkboxteaser
    text: show on homepage

	display_data:
		label: What should be displayed?
		type: checkboxes
		options:
			headline: Headline
			content: Text
			link: "Further Information" link
	teasertext:
	  label: Teasertext (optional)
		type:  textarea
		info: 
			de: Wenn dieses nicht Feld ausgefüllt wird, dann wird der Text im Feld "Content" als Teasertext verwendet.
			en: If this field is empty, the text of the field "Content" is used.
	select_image:
		label: Teaser image
		type: selectorsingleton
		mode: single