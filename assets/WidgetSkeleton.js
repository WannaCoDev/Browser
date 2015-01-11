/**
 * Widget initialization and management script
 * If you rename the widget, replace WidgetSkeleton instance to the new name
 *
 */

var IpWidget_WfileBrowser = function () {

    this.widgetObject = null;
    this.widgetOverlay = null;

    /**
     * Initialize widget management
     * @param widgetObject jquery object of an widget div
     * @param data widget's data
     */
    this.init = function (widgetObject, data) {
        //store widgetObject variable to be accessible from other functions
        this.widgetObject = widgetObject;
        this.widgetObject.css('min-height', '30px'); //if widget is empty it could be impossible to click on.

        var context = this; // set this so $.proxy would work below. http://api.jquery.com/jquery.proxy/

        //put an overlay over the widget and open popup on mouse click event
        this.$widgetOverlay = $('<div></div>');
        this.widgetObject.prepend(this.$widgetOverlay);
        this.$widgetOverlay.on('click', $.proxy(openPopup, this));
        $.proxy(fixOverlay, context)();

        //fix overlay size when widget is resized / moved
        $(document).on('ipWidgetResized', function () {
            $.proxy(fixOverlay, context)();
        });
        $(window).on('resize', function () {
            $.proxy(fixOverlay, context)();
        });

    };

    /**
     * Make the overlay div to cover the whole widget.
     */
    var fixOverlay = function () {
        this.$widgetOverlay
            .css('position', 'absolute')
            .css('z-index', 1000) // should be higher enough but lower than widget controls
            .width(this.widgetObject.width())
            .height(this.widgetObject.height());
    }


    /**
     * Automatically open settings popup when new widget added
     */
    this.onAdd = function () {
        $.proxy(openPopup, this)();
    };

    /**
     * Open widget management popup
     */
    var openPopup = function () {
        var context = this; // store current context for $.proxy bellow. http://api.jquery.com/jquery.proxy/
        

               this.popup = $('#BrowserPopup .ipsModal');
               this.popup.modal();
       
                //create new popup
               
        

                
            

        



    };

   

};