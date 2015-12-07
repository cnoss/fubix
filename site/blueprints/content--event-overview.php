<?php if(!defined('KIRBY')) exit ?>

title: Event Overview (Container)
pages:
	template:
		- content--event
files: false
fields:
  info:
  	label: Event Overview (Container)
  	type: info
  	text: This template displays all subpages(events) in a overview.
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
    label: Invisible Data
    type: headline
  keywords:
    label: Meta-Keywords
    type:  text
  desc:
    label: Meta-Description
    type:  text
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
  