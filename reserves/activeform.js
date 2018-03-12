(function ($) {
    $.fn.allowedCharacters = function ($regex) {
        $(this).keydown(function (e) {
            var $keyCode = e.keyCode;
            
            // Allow backspace, enter, delete
            if ($.inArray($keyCode, [8, 13, 46]) !== -1) {
                return;
            }
            
            // Allow Ctrl+A, Ctrl+V, Command+A
            if (($keyCode === 65 || $keyCode === 86) && (e.ctrlKey === true || e.metaKey === true)) {
                return;
            }
            
            // Allow: home, end, left, right, down, up
            if ($keyCode >= 35 && $keyCode <= 40) {
                return;
            }
            
            var $regularExpression = new RegExp("[" + $regex + "]", "g");
            
            if ($regularExpression.test(e.key)) {
                return;
            }
            
            e.preventDefault();
        });
    }
})(jQuery);