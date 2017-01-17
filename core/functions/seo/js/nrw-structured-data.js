jQuery(document).ready(function($) {
    var data_string = $("#add_structured_data_form").value;
    console.log(data_string);
    $.getJSON('http://schema.org/docs/tree.jsonld')
        .done(function(data) {
            var type;
            var data_table = $('.form-table').eq(3);
            var data_table_body = data_table.find('tbody');
            var scope_string = '<tr><th>Select the type of markup you want to create</th><td><select id="scopelist" name="scopelist"></select></td></tr>';
            data_table_body.append(scope_string);
            var scopelist = $('#scopelist');
            scopelist.append('<option value="none" selected disabled>Choose Correct Schema</option>');

            $.each(data.children, function(key, object) {
                scopelist.append('<option value="'+ object.name + '">' + object.name + '</option>');
            });

            scopelist.change(function() {
                if($('#catrow').length) {
                    $('#catrow').remove();
                }
                if($('#sl_row').length) {
                    $('#sl_row').remove();
                }
                if($('#tl_row').length) {
                    $('#tl_row').remove();
                }
                if($('#fl_row').length) {
                    $('#fl_row').remove();
                }
                var x = $(this).val();
                var nl;

                $.each(data.children, function(key, object) {
                    if(x === object.name){
                        nl = object
                    }
                });
                type = nl.name;
                console.log(type);

                var catlist;
                if(nl.children) {

                    if (!$('#catlist').length) {
                        var catlist_string = '<tr id="catrow"><th>Select the category</th><td><select id="catlist" name="catlist"></select></td></tr>';
                        data_table_body.append(catlist_string);
                    }
                    catlist = $('#catlist');

                    catlist.empty();
                    catlist.append('<option value="none" disabled selected>Choose Category</option>');
                    $.each(nl.children, function (key, object) {
                        catlist.append('<option value="' + object.name + '">' + object.name + '</option>');
                    });
                    catlist.change(function() {
                        if($('#sl_row').length) {
                            $('#sl_row').remove();
                        }
                        if($('#tl_row').length) {
                            $('#tl_row').remove();
                        }
                        if($('#fl_row').length) {
                            $('#fl_row').remove();
                        }
                        var cat = $(this).val();
                        var sl;
                        $.each(nl.children, function(key, object) {
                            if(cat === object.name){
                                sl = object;
                            }
                        });
                        type = sl.name;
                        console.log(type);
                        var sl_list;
                        if(sl.children) {
                            if (!$('#sl_list').length) {
                                var sl_string = '<tr id="sl_row"><th>Select subcategory</th><td><select id="sl_list" name="sl_list"></select></td></tr>';
                                data_table_body.append(sl_string);
                            }
                            sl_list = $('#sl_list');
                            sl_list.empty();
                            sl_list.append('<option value="none" disabled selected>Choose SubCategory</option>');
                            $.each(sl.children, function(key, object) {
                                sl_list.append('<option value="' + object.name + '">' + object.name + '</option>');
                            });
                            sl_list.change(function() {
                                if($('#tl_row').length) {
                                    $('#tl_row').remove();
                                }
                                if($('#fl_row').length) {
                                    $('#fl_row').remove();
                                }
                                var sl_cat = $(this).val();
                                var tl;
                                $.each(sl.children, function(key, object) {
                                    if(sl_cat === object.name) {
                                        tl = object;
                                    }
                                });
                                type = tl.name;
                                console.log(type);
                                var tl_list;
                                if(tl.children){
                                    if (!$('#tl_list').length) {
                                        var tl_string = '<tr id="tl_row"><th>Select super subcategory</th><td><select id="tl_list" name="tl_list"></select></td></tr>';
                                        data_table_body.append(tl_string);
                                    }
                                    tl_list = $('#tl_list');
                                    tl_list.empty();
                                    tl_list.append('<option value="none" disabled selected>Choose Super SubCategory</option>');
                                    $.each(tl.children, function(key, object) {
                                       tl_list.append('<option value="' + object.name + '">' + object.name + '</option>');
                                    });

                                    tl_list.change(function() {
                                        var tl_cat = $(this).val();
                                        var fl;
                                        $.each(tl.children, function(key, object) {
                                            if(tl_cat === object.name) {
                                                fl = object;
                                            }
                                        });
                                        type = fl.name;
                                        console.log(type);
                                        var fl_list;
                                        if(fl.children) {
                                            if(!$('#fl_list').length) {
                                                var fl_string = '<tr id="fl_row"><th>Select super duper subcategory</th><td><select id="fl_list" name="fl_list"></select></td></tr>';
                                                data_table_body.append(fl_string);
                                            }
                                            fl_list = $('#fl_list');
                                            fl_list.empty();
                                            fl_list.append('<option value="none" disabled selected>Choose Super Duper SubCategory</option>');
                                            $.each(fl.children, function(key, object) {
                                                fl_list.append('<option value="' + object.name + '">' + object.name + '</option>');
                                            });
                                            fl_list.change(function() {
                                                var fl_cat = $(this).val();
                                                var fthl;
                                                $.each(fl.children, function(key, object) {
                                                    if(fl_cat === object.name){
                                                        fthl = object;
                                                    }
                                                });
                                                type = fthl.name;
                                                console.log(type);
                                            })
                                        } else {
                                            if($('#fl_row').length) {
                                                $('#fl_row').remove();
                                            }
                                            type = fl.name;
                                            console.log(type);
                                        }
                                    })
                                } else {
                                    if($('#tl_row').length) {
                                        $('#tl_row').remove();
                                    }
                                    if($('#fl_row').length) {
                                        $('#fl_row').remove();
                                    }
                                    type = tl.name;
                                    console.log(type);
                                }
                            })
                        } else {
                            if($('#sl_row').length) {
                                $('#sl_row').remove();
                            }
                            if($('#tl_row').length) {
                                $('#tl_row').remove();
                            }
                            type = sl.name;
                            console.log(type);
                        }
                    })
                } else {
                    if($('#catrow').length) {
                        $('#catrow').remove();
                    }
                    if($('#sl_row').length) {
                        $('#sl_row').remove();
                    }
                    if($('#tl_row').length) {
                        $('#tl_row').remove();
                    }
                    type = nl.name;
                    console.log(type);
                }
            });
        });
});



