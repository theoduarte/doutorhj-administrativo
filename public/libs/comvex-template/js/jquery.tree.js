/**
 * Theme: Minton Admin Template
 * Author: Coderthemes
 * Tree view
 */

$( document ).ready(function() {
    // Basic
    $('.cvx-basic-tree').jstree({
        'core' : {
            'themes' : {
                'responsive': false
            }
        },
        'types' : {
            'default' : {
                'icon' : 'fa fa-folder'
            },
            'file' : {
                'icon' : 'fa fa-file'
            },
            'has_permission' : {
                'icon' : 'ti-check-box'
            },
            'not_allowed' : {
                'icon' : 'ti-na'
            }
        },
        'plugins' : ['types']
    });

    // Checkbox
    $('#checkTree')
    .on("select_node.jstree", function (e, data) {
    	//alert("node_id: " + data.node.id);
    	
    	if($('#'+data.node.id+'_anchor').parent().find('ul.jstree-children').length) {
    		$('#'+data.node.id+'_anchor').parent().find('ul.jstree-children').find('input.cb_item_tree_node').prop('checked', true)
    	} else {
    		$('#'+data.node.id).find('input.cb_item_tree_node').prop('checked', true);
    	}
    })
    .on("deselect_node.jstree", function (e, data) {
    	//alert("node_id: " + data.node.id);
    	$('#'+data.node.id).find('input.cb_item_tree_node').prop('checked', false);
    })
    .jstree({
        'core' : {
            'themes' : {
                'responsive': false
            }
        },
        'types' : {
            'default' : {
                'icon' : 'fa fa-folder'
            },
            'file' : {
                'icon' : 'fa fa-file'
            },
            'tree_node' : {
                'icon' : 'fa fa-circle item_tree_node'
            }
        },
        'ui': { theme_name : "checkbox" },
        'plugins' : ['types', 'checkbox', 'ui']
    });

    // Drag & Drop
    $('#dragTree').jstree({
        'core' : {
            'check_callback' : true,
            'themes' : {
                'responsive': false
            }
        },
        'types' : {
            'default' : {
                'icon' : 'fa fa-folder'
            },
            'file' : {
                'icon' : 'fa fa-file'
            }
        },
        'plugins' : ['types', 'dnd']
    });

    // Ajax
    $('#ajaxTree').jstree({
        'core' : {
            'check_callback' : true,
            'themes' : {
                'responsive': false
            },
            'data' : {
                'url' : function (node) {
                    return node.id === '#' ? '../plugins/jstree/ajax_roots.json' : '../plugins/jstree/ajax_children.json';
                },
                'data' : function (node) {
                    return { 'id' : node.id };
                }
            }
        },
        "types" : {
            'default' : {
                'icon' : 'fa fa-folder'
            },
            'file' : {
                'icon' : 'fa fa-file'
            }
        },
        "plugins" : [ "contextmenu", "dnd", "search", "state", "types", "wholerow" ]
    });
});