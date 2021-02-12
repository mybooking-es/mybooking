(function( api, $ ) {
    'use strict';

    var myBookingCarrouselControl = api.Control.extend({

        /**
         * Holds a reference to  wp.media to allow select the images
         * for the carrousel
         */
        mediaGallery: null,

        // ----------------- Control initializer

        /**
         * 
         */
        ready: function() {

            console.log('ready-carrousel');

            // Use underscore bindAll method to be sure that the following methods
            // will be invoked with a this that correspond to the control
            _.bindAll( this, 'initData', 'openMediaGallery', 'selectMediaGalleryImages', 'showCurrentSelectionInMediaGallery', 'clearCarrousel' );

            // Initialize data
            this.initData();

            // Update the data and render the control when the setting changes.
            this.setting.bind( this.initData );

            // Events : Open Media Gallery on carrousel-configure-btn click or keydown
            this.container.on( 'click', '.configure-carrousel-button', this.openMediaGallery );
            this.container.on( 'keydown', '.configure-carrousel-button', this.openMediaGallery );

            // Events:: Remove all elements on  carrousel-clear-btn click or keydown
            this.container.on( 'click', '.clear-carrousel-button', this.clearCarrousel );
            this.container.on( 'keydown', '.clear-carrousel-button', this.clearCarrousel );
        },

        // ---------------------- Support methods ---------------------------------------

        /**
         * Initialize Data
         */
        initData: function() {

            var self = this;

            // Get the current value (array of image ids)
            var value = this.setting.get();

            // Clear the data
            this.params.carrousel_items = [];

            // Get the data in the library
            var promises = value.map(function(id, index, array){
                                        var hasAttachmentData = new $.Deferred();
                                        wp.media.attachment( id ).fetch().done( function() {
                                            self.params.carrousel_items[ index ] = this.attributes;
                                            hasAttachmentData.resolve();
                                        } );
                                        return hasAttachmentData;                
                                    });
        
            // When checking everything, renders the content
            $.when.apply( this, promises ).then( function(){
                self.renderContent();
                self.configureSortCarrouselItems();
            });

        },

        // --------------- Clear carrousel 

        clearCarrousel: function( event ) {
            
            event.preventDefault();
            // Assign an empty array to remove all items
            this.setting.set( [] );

        },


        // --------------- Media Gallery Interaction --------------------

        /**
         * Open the media gallery.
         */
        openMediaGallery: function( event ) {
            event.preventDefault();

            if ( this.mediaGallery == null ) {
                this.initMediaGallery();
            }

            this.mediaGallery.open();
        },

        /**
         * Initiate the media gallery
         */
        initMediaGallery: function() {

            // Prepare the media gallery
            this.mediaGallery = wp.media({
                states: [
                    new wp.media.controller.Library({
                        library: wp.media.query({ type: 'image' }),
                        multiple: 'add'
                    })
                ]
            });

            // Setup media events
            // When open the gallery show the carrousel items as selected
            this.mediaGallery.on( 'open', this.showCurrentSelectionInMediaGallery );
            // When the select button is clicked, update the carrousel images
            this.mediaGallery.on( 'select', this.selectMediaGalleryImages );
        },

        /**
         * Media Gallery callback on Open
         */
        showCurrentSelectionInMediaGallery: function() {

            // Get the media gallery
            var library = this.mediaGallery.state().get( 'library' );

            // Get the selected images
            var selection = this.mediaGallery.state().get( 'selection' );
            
            // Get the value of the control (stored in setting)
            var ids = this.setting.get();

            // Prepare a compator to show the selected items on top
            library.comparator = function( a, b ) {
                var hasA = (true === this.mirroring.get( a.cid ) );
                var hasB = (true === this.mirroring.get( b.cid ) );

                if ( ! hasA && hasB ) {
                    return -1;
                } else if ( hasA && ! hasB ) {
                    return 1;
                } else {
                    return 0;
                }
            };

            // Select the items
            ids.forEach(function(currentValue, index, array) {
                var item = wp.media.attachment( currentValue );
                selection.add( item ? [ item ] : [] );
                library.add( item ? [ item ] : [] );
            });

        },

        /**
         * Media Gallery select callback on Select
         */
        selectMediaGalleryImages: function() {

            // Get the carrousel items
            var mediaGallerySelection = this.mediaGallery.state().get( 'selection' ); 
            this.params.carrousel_items = mediaGallerySelection;

            // Get the carrousel items ids
            var mediaItemsIds =  mediaGallerySelection.map(function(currentValue) {
                                                              return currentValue.id;
                                                           });
            // Store in the setting
            this.setting.set( mediaItemsIds );
        },

        /* ----------------------- Support methods -------------------

        /**
         * Configure sorting the items
         */
        configureSortCarrouselItems: function() {
            var self = this;
            $( '.carrousel-container' ).sortable({
                items: '.carrousel-item-container',
                stop: function() {
                    // When stock sorting, rebuild the selected items structure
                    var selectedValues = $(this).find( '.carrousel-item-container' ).toArray();
                    selectedValues = selectedValues.map( function(currentValue, index, array) {
                                                            var id = parseInt( $( currentValue ).attr( 'data-id' ), 10 );
                                                            return id;
                                                         });
                    self.setting.set( selectedValues );
                }
            });
        }

    });

    api.controlConstructor['mybooking_carrousel'] = myBookingCarrouselControl;

})( wp.customize, jQuery );