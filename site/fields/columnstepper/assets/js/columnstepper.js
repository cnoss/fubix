
Columnstepper = (function($, $field) {

    var self = this;

    this.$field     = $field;
    this.$storage   = $field.find('.js-selector-storage');
    this.$items     = $field.find('.js-selector-item');
    this.columns    = 1;
    this.content    = {};

//    this.mode       = $field.data('mode');
//    this.autoselect = $field.data('autoselect');
//    this.size       = $field.data('size');

    /**
     * Initialize fileselect field
     *
     * @since 1.0.0
     */
    this.init = function() {

        // Toogle Textareas
        self.toggleTextareas();

        // get columns
        self.$field.find('.js-columnstepper-checkbox-columns').click(self.getColumns);

        // Update data before saving
        $("form").on('submit', function(e) {
            self.updateStorage();
        });

    };


    this.toggleTextareas = function() {

        self.columns = $("input[name=text_columns]:checked").val();


        if(self.columns == 1){
            $("#input-column-2, #input-column-3").slideUp(50);
        }else if(self.columns == 2){
             $("#input-column-2").slideDown();
             $("#input-column-3").slideUp(50);
        }else{
            $("#input-column-2, #input-column-3").slideDown();
        }

    };

    /**
     * Gets the Number of Columns
     *
     * @since 1.0.0
     */
    this.getColumns = function(event) {

        // Store
        self.columns = $("input[name=text_columns]:checked").val();

        if(self.columns == 1){
            $("#input-column-2, #input-column-3").slideUp();
        }else if(self.columns == 2){
             $("#input-column-2").slideDown();
             $("#input-column-3").slideUp();
        }else{
            $("#input-column-2, #input-column-3").slideDown();
        }

        // Initialize storage element value
        self.updateStorage();
    };





    /**
     * Update storage input element with current state
     *
     * @since 1.0.0
     */
    this.updateStorage = function() {

        var resobj = {};

        // How many columns?
        resobj.noc = $("input[name=text_columns]:checked").val();

        // Get Contents
        resobj.text2 = $("#form-field-text_column_2").val();
        resobj.text3 = $("#form-field-text_column_3").val();

        // Set string representation of the result as storage value
        self.$storage.val("[" + JSON.stringify(resobj) + "]");
    };

    return this.init();

});

(function($) {

    /**
     * Tell the Panel to run our initialization.
     *
     * This callback will fire for every Fileselect
     * Field on the current panel page.
     *
     * @see https://github.com/getkirby/panel/issues/228#issuecomment-58379016
     * @since 1.0.0
     */

    $.fn.columnstepper = function() {
        return new Columnstepper($, this);
    };

})(jQuery);
