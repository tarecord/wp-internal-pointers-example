jQuery(document).ready( function($) {
    let pointerId = 1;
    let pointer = $('#menu-posts').pointer({
        content: '<h3>This is a Pointer</h3><p>You can use these to walk users through new features or call attention to changes in functionality.</p>',
        position: {
               edge: 'left',
               align: 'center'
           },
        close: function() {
            $.post( ajaxurl, {
             pointer: 'tar-pointer-' + pointerId,
             action: 'dismiss-wp-pointer'
            })
        }
    }).pointer('open');

    // Update the pointer to have a unique 
    pointer.pointer('widget').attr('id', 'tar-pointer-' + pointerId);
});
