<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="<?php echo base_url();?>assets/__css/typeahead.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/spoiler/css/spoiler.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/widgetbootstrap/contents.css" rel="stylesheet">
    <!--<link href="<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/codesnippet/lib/highlight/styles/default.css" rel="stylesheet">-->
    <script src="<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <script src="<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/spoiler/js/spoiler.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script type="text/javascript">
    $(function(){
        $('select option').each(function() {
                if ($( this ).index() % 2 == 1)
                    $( this ).css({"background-color":"#F0F0F0"});
            });
            
        $('select').on({
            change: function() {
                // console.log($('select > option:last').val());
                // console.log( $( "select option:selected" ).index() ); // or $( "#select-theme option:selected" )
                var $t_css_link = "<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/codesnippet/lib/highlight/styles/";
                // $('select').selectedIndex = this.index;
                var $t_href = $t_css_link + $(this).val() + ".css"; // this.value works too
                $("head").children("[hj='highlight']").remove();
                $("head").append($("<link href="+ $t_href + " hj='highlight' type='text/css' rel='stylesheet'/>"));
            }
        }).change();
        
        /*$("code").on('click', function() {
            $(this).addClass('source');
            $(this).append('<textarea>'+ $(this).text() + '</textarea>');
            $('textarea', this).selText().addClass("selected");
        });*/
        
        var toggleStrip = function(boo){
            var arr = $("pre").html().split('\n');
            if (boo){
                $.each(arr,function(i,v){
                    var replace;
                    if (i % 2 == 1){
                        replace = '<span class="line-alt1">' + v + '</span>';
                        $("code").html(function () {
                            return $(this).html().replace(v, replace);
                        });
                    } else {
                        replace = '<span class="line-alt2">' + v + '</span>';
                        $("code").html(function () {
                            return $(this).html().replace(v, replace);
                        });
                    }
                    $("code").html(function (data) {
                        console.log(data);
                        return $(this).html().replace('\n', '');
                    });
                });
            
            console.log($("code").html());
            } else    
                // window.location.reload();
            {
                var arr = $("pre").html().split('\n');
                $("code").html(function (data) {
                    console.log(data);
                    return $(this).html().replace('\n', '');
                });
            }
            // $('.span-alt, .line-alt1, .line-alt2, code div, pre table').contents().unwrap();
        };
        
        $('input:checkbox').on('change', function(data){
            toggleStrip($(this).is(":checked"));
        });
        
        setTimeout(function() {
            $('#foo').show('slow');
        }, 1000);
    });
    </script>
    <style type="text/css">
        pre {
            max-height: 80%;
            overflow-y: auto;
            overflow-x: hidden;
        }
        #foo {
            display: none;
        }
    </style>
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>
</head>
<body>
    
<!-- Beginning header <a href='<?php echo site_url('examples/offices_management')?>'>Offices</a> |  -->
    <div>
        <select id="select-theme" class="typeahead">
            <option value="monokai_sublime">monokai_sublime</option>
            <option value="default" selected="selected">default</option>
            <option value="arta">arta</option>
            <option value="ascetic">ascetic</option>
            <option value="atelier-dune.dark">atelier-dune.dark</option>
            <option value="atelier-dune.light">atelier-dune.light</option>
            <option value="atelier-forest.dark">atelier-forest.dark</option>
            <option value="atelier-forest.light">atelier-forest.light</option>
            <option value="atelier-heath.dark">atelier-heath.dark</option>
            <option value="atelier-heath.light">atelier-heath.light</option>
            <option value="atelier-lakeside.dark">atelier-lakeside.dark</option>
            <option value="atelier-lakeside.light">atelier-lakeside.light</option>
            <option value="atelier-seaside.dark">atelier-seaside.dark</option>
            <option value="atelier-seaside.light">atelier-seaside.light</option>
            <option value="brown_paper">brown_paper</option>
            <option value="dark">dark</option>
            <option value="docco">docco</option>
            <option value="far">far</option>
            <option value="foundation">foundation</option>
            <option value="github">github</option>
            <option value="googlecode">googlecode</option>
            <option value="idea">idea</option>
            <option value="ir_black">ir_black</option>
            <option value="magula">magula</option>
            <option value="mono-blue">mono-blue</option>
            <option value="monokai">monokai</option>
            <option value="obsidian">obsidian</option>
            <option value="paraiso.dark">paraiso.dark</option>
            <option value="paraiso.light">paraiso.light</option>
            <option value="pojoaque">pojoaque</option>
            <option value="railscasts">railscasts</option>
            <option value="rainbow">rainbow</option>
            <option value="school_book">school_book</option>
            <option value="solarized_dark">solarized_dark</option>
            <option value="solarized_light">solarized_light</option>
            <option value="sunburst">sunburst</option>
            <option value="tomorrow-night-blue">tomorrow-night-blue</option>
            <option value="tomorrow-night-bright">tomorrow-night-bright</option>
            <option value="tomorrow-night-eighties">tomorrow-night-eighties</option>
            <option value="tomorrow-night">tomorrow-night</option>
            <option value="tomorrow">tomorrow</option>
            <option value="vs">vs</option>
            <option value="xcode">xcode</option>
            <option value="zenburn">zenburn</option>
        </select>
        <label>     Striped Background<input type="checkbox" name="checkbox" value="value"></label>

    </div>
<!-- End of header-->
    <div style='height:20px;'></div>  
    <div>
        <?php echo $output; ?> 
    </div>
<!-- Beginning footer -->
<div id="foo">ZeTek</div>
<!-- End of Footer -->
</body>
</html>