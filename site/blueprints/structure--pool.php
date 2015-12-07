<?php if(!defined('KIRBY')) exit ?>

title: Pool (Structure Template)
pages:
  template:
    - structure--category
fields:
  info:
  	label: Pool (Structure Template)
  	type: info
  	text: Dieses Template beinhaltet einen Fragenpool.
  	width: 1/2
  title:
    label: Title/ Headline
    type:  text
  description:
  	label: Beschreibung des Pools
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
