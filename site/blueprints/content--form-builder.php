<?php if(!defined('KIRBY')) exit ?>

title: Form (Content Template)
pages: false
files: false
fields:
  info:
  	label: Form (Content Template)
  	type: info
  	text: This templates generates a form.
  	width: 1/2
  visible:
    label: Visible Data
    type: headline
  title:
    label: Title/ Headline
    type:  text  
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
      numberinput:
        label: Number Input
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
      text:
        label: Explanation Text
        fields:
          explanation-text:
            label: Explanation Text
            type: text
            required: true
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
          option5:
            label: Fifth Option
            type: text
          option6:
            label: Sixth Option
            type: text
          option7:
            label: Seventh Option
            type: text
          display-stacked:
            label: Layout
            type: checkbox
            text: Stacked (default is inline)
      dropdown:
        label: Dropdown Field
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
          option5:
            label: Fifth Option
            type: text
          option6:
            label: Sixth Option
            type: text
          option7:
            label: Seventh Option
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
          option3:
            label: Third Option
            type: text         
          option4:
            label: Fourth Option
            type: text
          option5:
            label: Fifth Option
            type: text
          option6:
            label: Sixth Option
            type: text
          option7:
            label: Seventh Option
            type: text
  invisible:
    label: Invisible Form Data
    type: headline
  recipient:
    label: Recipient (E-Mail Adress)
    type:  text  
    help: Divide multiple recipients by comma. Leave empty to use default partner e-mail adress.
  answer-text:
   label: Answer text
   type: textarea
   help: After sending the form this text will be send to the user.
   placeholder: Thank you for your registration.
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

    
