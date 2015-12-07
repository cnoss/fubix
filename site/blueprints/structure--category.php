<?php if(!defined('KIRBY')) exit ?>

title: Category (Structure Template)
pages:
  template:
    - structure--category
    - content--question
fields:
  info:
  	label: Category (Structure Template)
  	type: info
  	text: Dieses Template beinhaltet eine Kategorie.
  	width: 1/2
  title:
    label: Title/ Headline
    type:  text
  description:
  	label: Beschreibung der Kategorie
  	type: textarea
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
