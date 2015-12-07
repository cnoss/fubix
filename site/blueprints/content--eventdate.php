<?php if(!defined('KIRBY')) exit ?>

title: Eventdate (Content Template)
pages: false
files: false
fields:
  info:
  	label: Dates of events (Content Template)
  	type: info
  	text: This templates displays a single date of a event.
  	width: 1/2
  visible:
    label: Visible Data
    type: headline
  title:
    label: Title
    type: text
    format: YYYY-MM-DD
    width: 1/2
  data:
    label: Data (only editable in your main language)
    type: headline
  datum:
    label: Date
    type: datesingleton
    format: YYYY-MM-DD
    width: 1/2
  start:
    label: Starting time
    type: timesingleton
    interval: 30
    width: 1/2
  end:
    label: Ending Time
    type: timesingleton
    interval: 30
    width: 1/2

    
