$("body").off("click", ".filters .row-line"),
    $("body").on("click", ".filters .row-line", function () {
        var target = $(this),
        e = $(this).closest(".searchItem"),
        n = $(e).data("search"),
        i = $(this).data("value");
        e.find(".selected").removeClass("selected"),target.addClass("selected"),$("[name='" + n + "']").val(i);
        $("#filters-form").submit(),
        window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (t, e, i) {
            n[e] = i;
        })
    });

$('#reset').click(function(){
    $("input[type='hidden']", $('#filters-form')).each(function() {
        var $t = $(this);
        if($t.attr('name')=="_token"){

        }else{
            $t.val($t.data('defaultvalue'));
        }

      });
    $("#filters-form").submit();
});


