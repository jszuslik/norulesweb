jQuery(document).ready(function($) {
    var data_string = $("#add_structured_data_form").value;
    console.log(data_string);
    $.getJSON('http://schema.org/docs/tree.jsonld')
        .done(function(data) {
            var data_table = $('.form-table').eq(3);
            var data_table_body = data_table.find('tbody');
            var scope_string = '<tr><th>Scope</th><td><select id="scopelist" name="scopelist">';
            console.log(data.children);
            $.each(data.children, function(key, object) {
                scope_string += '<option value="'+ key + '">' + object.name + '</option>';
            });
            scope_string += '</select></td></tr>';
            console.log(scope_string);
            data_table_body.append(scope_string);
            $('#scopelist').change(function() {
                var x = $(this).val();
                $('#add_structured_data_form').val(x);
            })
        });



})


