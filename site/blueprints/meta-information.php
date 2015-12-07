<?php if(!defined('KIRBY')) exit ?>

title: Meta Information
pages: false
deletable: false
files:
  hide: true
fields:
  info:
  	label: Meta Information
  	type: info
  	text: This templates provides data that is used on several subpages.
  	width: 1/2
  title:
    label: Title - please do not edit
    type:  text

    
  partner-logo:
  	label: Logo (only editable by admin)
  	type: selectoradmin
  	mode: single

  visible:
    label: Data
    type: headline
  link-to-corporate:
    label: Link to corporate website
    type: urladmin

  openingtimes:
    label: Opening Times
    type:  textarea
  further-website:
    label: Further Website (only editable by admin)
    type: headline    
  further-url:
    label: URL
    type: urladmin
    width: 1/2
  further-linktext:
    label: Linktext
    type:  textadmin
    width: 1/2

	socialmedia:
    label: Social Media (only editable by admin)
    type: headline
    
	sm-facebook:
		label: URL Facebook
		type: urladmin
		width: 1/2
	sm-twitter:
		label: URL Twitter
		type: urladmin
		width: 1/2
	sm-pinterest:
		label: URL Pinterest
		type: urladmin
		width: 1/2
	sm-instagramm:
		label: URL Instagramm
		type: urladmin
		width: 1/2
	sm-linkedin:
		label: URL LinkedIn
		type: urladmin
		width: 1/2
	sm-xing:
		label: URL Xing
		type: urladmin
		width: 1/2
	sm-googleplus:
		label: URL Google+
		type: urladmin
		width: 1/2
	sm-youtube:
		label: URL YouTube
		type: urladmin
		width: 1/2
	sm-vimeo:
		label: URL Vimeo
		type: urladmin
		width: 1/2
	sm-tumblr:
		label: URL tumblr
		type: urladmin
		width: 1/2
	further-links:
    label: Further Links (only editable by admin)
    type: headline
    
	further-infomaterial:
    label: Footer links
    type: checkboxesadmin
    options:
      infomaterial: Order informative material
      partners: Show partner page
      press: Show press page
      
	further-footer-links:
    label: Further Footer Links (only editable by admin)
    type: headline
	further-url-1:
		label: URL Link 1
		type: textadmin
		width: 1/2
	further-linktext-1:
		label: Linktext Link 1
		type:  textadmin
		width: 1/2
	further-url-2:
		label: URL Link 2
		type: textadmin
		width: 1/2
	further-linktext-2:
		label: Linktext Link 2
		type:  textadmin
		width: 1/2
		
	footer-snippet:
		label: HTML or Script Snippet (only editable by admin)
		type: textareaadmin
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
	shortcuts:
		label: Shortcut to pages (only editable by admin)
		type: structure
		entry: >
			Shortcut <strong>{{shortcut}}</strong> points to <strong>{{target}}</strong>
		fields:
			shortcut:
				type: textadmin
				label: Shortcut
			target:
				type: urladmin
				label: Target URL