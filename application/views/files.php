<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title>Files</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
</head>
<style type="text/css">
    body{
        font:14px/18px arial;
    }

    .folder{
        background-image: url(<?php echo base_url();?>/images/folder.png);
        background-repeat: no-repeat;
    }
    
    .file{
        background-image: url(<?php echo base_url();?>/images/file.png);
        background-repeat: no-repeat;
    }
    ul{
        list-style: none;
        padding-left: 20px;
        cursor: pointer;
    }
    li{
        padding-left: 20px;
        margin: 2px;
    }


</style>
<body>
    <?php //print_r($files); ?>
    <div id="files">

    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        var files = <?php echo json_encode($files); ?>;
        var file_tree = build_file_tree(files);
        file_tree.appendTo('#files');

        function build_file_tree(files)
        {
            var tree = $('<ul>');

            for (x in files)
            {
                if (typeof files[x] == "object")
                {
                    var span = $('<span>').html(x).appendTo(
                        $('<li>').appendTo(tree).addClass('folder')
                        );
                    var subtree = build_file_tree(files[x]).hide();
                    span.after(subtree);
                    span.click(function(){
                        $(this).parent().find('ul:first').toggle();
                    });

                }
                else
                {
                    $('<li>').html(files[x]).appendTo(tree).addClass('file');
                }
            }
            return tree;

        }


    });
    
    </script>
</body>
</html>