<?php if(!defined('KIRBY')) exit ?>

title: Answer (Content Template)
pages: false
files:
	sortable: true
fields:
  info:
  	label: Question (Content Template)
  	type: info
  	text: Dieses Template beinhaltet eine Frage.
  	width: 1/2
  visible:
    label: Visible Data
    type: headline
  title:
    label: Kurzantwort
    type:  text
  answer-long:
    label: Langantwort
    type: textarea
  background:
  	label: Hintergrund
  	type: textarea
  invisible:
    label: Invisible Data (only editable in your main language)
    type: headline
  autor:
  	label: Autor
  	type: text
  	icon: user
  	width: 1/2
  date:
    label: Date
    type: date
    format: YYYY-MM-DD
    width: 1/2
