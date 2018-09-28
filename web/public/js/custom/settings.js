(function($) {

    function checker(e){
        var target = e.currentTarget;
        var value = (target.checked) ? 1 : 0;
        var enable = $('#'+target.id+'_enable');
        enable.val(value);
    }

   $("#widgetsForm input:checkbox").bind('change', function(e) {
       checker(e);
   });


})(jQuery);
