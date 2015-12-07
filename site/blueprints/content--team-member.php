<?php if(!defined('KIRBY')) exit ?>

title: Team Member (Content Template)
pages: false
files: 
	sortable: true
fields:
  info:
  	label: Team Member (Content Template)
  	type: info
  	text: This template displays a single team member.
  	width: 1/2
  visible:
    label: Visible Data
    type: headline
  title:
    label: Title/ Headline
    type:  text  
  function:
  	label: Job Description
  	type: text	
  further_information:
  	label: Further Information
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