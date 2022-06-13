<script>
    var create = function (){
    //init validate form org
    var create_form = "#log-form";
    var create_rules = {
        fullname: {
            required: true,
        },
        username: {
            required: true,
            minlength: 3,
            maxlength: 100,
        },
    };

    init_validate_form (create_form,create_rules);
};

$(document).ready(function() {
    create();
});

</script>  