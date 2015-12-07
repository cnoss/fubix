
Layoutswitcher = (function($, $field) {

    var self = this;

    this.$field     = $field;
    this.$storage   = $field.find('.js-selector-storage');
    this.$items     = $field.find('.js-selector-item');
    this.columns    = 1;
    this.content    = {};
    this.layout     = {};

//    this.mode       = $field.data('mode');
//    this.autoselect = $field.data('autoselect');
//    this.size       = $field.data('size');

    /**
     * Initialize fileselect field
     *
     * @since 1.0.0
     */
    this.init = function() {

        // updatePreview
        $(".layoutswitcher input[type=radio]").click(self.updatePreview);
        self.updatePreview();


        // Update data before saving
        $("form").on('submit', function(e) {
            self.updateStorage();
        });


    };

    /**
     * shows a Preview of the Layout
     *
     * @since 1.0.0
     */
    this.updatePreview = function() {

        data = self.updateStorage();

        var textclasses = "text ";
        textclasses += (data.notc == "1") ? "col-md-4" : "";
        textclasses += (data.notc == "2") ? "col-md-6" : "";
        textclasses += (data.notc == "3") ? "col-md-12" : "";
        $("#layoutdemo .text").attr("class", textclasses);

        if(data.otc == "top" && data.appearance != "unten"){
            $("[data-pos=text-oben]").show();
            $("[data-pos=text-mitte]").hide();
            $("[data-pos=text-unten]").hide();

        }else if(data.otc != "top" && data.appearance != "unten"){
            $("[data-pos=text-oben]").hide();
            $("[data-pos=text-mitte]").show();
            $("[data-pos=text-unten]").hide();

        }else{
            $("[data-pos=text-oben]").hide();
            $("[data-pos=text-mitte]").hide();
            $("[data-pos=text-unten]").show();
            $("#textblock-1-mitte").show();
        }

        // Wie viele Bilder gibt es?
        var noi_ist = $("#layout_switcher").data("noi");

        // Wenn es BIlder gibt: Preview zeigen
        if(noi_ist == 0){ $("#layoutdemo #bildblock").hide(); }
        else{ $("#layoutdemo #bildblock").show(); }

        if(data.noi == 1){ $("#layoutdemo #bildblock #td-2").hide(); $("#layoutdemo #bildblock #td-3").hide(); }
        if(data.noi == 2){ $("#layoutdemo #bildblock #td-2").show(); $("#layoutdemo #bildblock #td-3").hide(); }
        if(data.noi == 3){ $("#layoutdemo #bildblock #td-2").show(); $("#layoutdemo #bildblock #td-3").show(); }

        var imageclasses = "bild ";
        imageclasses += (data.noic == "1") ? "col-md-4" : "";
        imageclasses += (data.noic == "2") ? "col-md-6" : "";
        imageclasses += (data.noic == "3") ? "col-md-8" : "";
        imageclasses += (data.noic == "4") ? "col-md-12" : "";

        imageclasses += (data.noi == "2") ? " zweier" : "";
        imageclasses += (data.noi == "3") ? " dreier" : "";
        imageclasses += (data.otc == "left") ? " pull-right" : "";

        $("#layoutdemo #bildblock").attr("class", imageclasses);
        $("#layoutdemo #bildblock #td-1").attr("class", "noi-"+data.noi);


    };


    /**
     * Update storage input element with current state
     *
     * @since 1.0.0
     */
    this.updateStorage = function() {


        var resobj = {};

        // Number of image columns: How many columns does an image span?
        resobj.noic = $("input[name=noic]:checked").val();

        // Number of images in Layout: How many images are shown?
        resobj.noi = $("input[name=noi]:checked").val();

        // Number of text column span: How many columns does an text span?
        resobj.notc = $("input[name=notc]:checked").val();

        // Orientation of text columns
        resobj.otc = $("input[name=otc]:checked").val();

        // appearance of text
        resobj.appearance = $("input[name=appearance]:checked").val();

        // Start slideshow
        resobj.slideshow_autostart = $("input[name=slideshow_autostart]:checked").val();

        // Set string representation of the result as storage value
        self.$storage.val("[" + JSON.stringify(resobj) + "]");

        return resobj;
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

    $.fn.layoutswitcher = function() {
        return new Layoutswitcher($, this);
    };


})(jQuery);
