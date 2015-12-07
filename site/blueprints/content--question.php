<?php if(!defined('KIRBY')) exit ?>

title: Question (Content Template)
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
    label: Title/ Headline
    type:  text
  frage:
  	label: Frage
  	type: textarea
  antworten:
    label: Antworten
    type: structure
    entry: >
      <strong>{{antwort}}</strong> // {{wahr}}
    fields:
      antwort:
        label: Antwort
        type: textarea
      wahr:
        label: Richtige Antwort
        type: toggle
        text: yes/no

  hintergrund:
    label: Hintergrund
    type: headline
  erklaerung:
    label: Erläuterung
    type: textarea
  quelle:
    label: Quelle/Referenz
    type: url

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
