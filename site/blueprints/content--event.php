<?php if(!defined('KIRBY')) exit ?>

title: Event (Content Template)
pages:
  template:
    - content--eventdate
  build:
    - title: Termine
      uid: date
      num: 2
      template: content--eventdate
files: 
	sortable: true
fields:
  info:
  	label: Event (Content Template)
  	type: info
  	text: This templates displays a single event.
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
  form:
    label: Application Form
    type: headline
  show-form:
    label: Application Form
    type: checkbox
    text: Do you want to display the application form?
	builder:
    label: Form Fields
    type: builder
    fieldsets:
      textinput:
        label: Text Input
        fields:
          name:
            label: Name
            type: text
            required: true
          textlabel:
            label: Label
            type: text
            required: true
          required:
            label: Required field
            type: checkbox
            text: Is the field required?
      textarea:
        label: Text Area
        fields:
          name:
            label: Name
            type: text
            required: true
          textlabel:
            label: Label
            type: text
            required: true
          required:
            label: Required field
            type: checkbox
            text: Is the field required?
      radiobutton:
        label: Radio Button
        fields:
          name:
            label: Name
            type: text
            required: true
          textlabel:
            label: Label
            type: text
            required: true
          required:
            label: Required field
            type: checkbox
            text: Is the field required?
          option1:
            label: First Option
            type: text
            required: true
          option2:
            label: Second Option
            type: text
            required: true
          option3:
            label: Third Option
            type: text         
          option4:
            label: Fourth Option
            type: text
      checkbox:
        label: Checkbox
        fields:
          name:
            label: Name
            type: text
            required: true
          textlabel:
            label: Label
            type: text
            required: true
          required:
            label: Required field
            type: checkbox
            text: Is the field required?
          option1:
            label: First Option
            type: text
            required: true
          option2:
            label: Second Option
            type: text
            required: true
          option3:
            label: Third Option
            type: text         
          option4:
            label: Fourth Option
            type: text
	invisibleformdata:
    	label: Invisible Form Data
		type: headline
	recipient:
		label: Recipient (E-Mail Adress)
		type: text  
		help: Divide multiple recipients by comma. Leave empty to use default partner e-mail adress.
	answer-text:
		label: Answer text
		type: textarea
		help: After sending the form this text will be send to the user.
		placeholder: Thank you for your registration.		
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
			jump_to_link: Link to event
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