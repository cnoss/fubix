<?php if(!defined('KIRBY')) exit ?>

title: Meta Data
pages: false
deletable: false
files:
  hide: true
fields:
  info:
  	label: Meta Data
  	type: info
  	text: This templates provides data for meta information.
  	width: 1/2
  title:
    label: Title - please do not edit
    type:  text

   invisible:
    label: Invisible Data
    type: headline
  keywords:
    label: Meta-Keywords
    type:  text
  desc:
    label: Meta-Description
    type:  textarea
  facebook-title:
	label: Facebook Title
	type:  text
  facebook:
	label: Facebook Text
	type:  textarea