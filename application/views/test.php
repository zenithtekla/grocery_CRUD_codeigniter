<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>EXPORT</title>
    <link href="<?php echo base_url();?>assets/__css/typeahead.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/spoiler/css/spoiler.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/widgetbootstrap/contents.css" rel="stylesheet">

    <?php
    foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>
    
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <script src="<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    
    <script src="<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/spoiler/js/spoiler.js"></script>
    <script type="text/javascript">
        $(function(){
            $('select option').each(function() {
                if ($( this ).index() % 2 == 1)
                    $( this ).css({"background-color":"#F0F0F0"});
            });
            
            $("#select-theme").on('change', function() {
                // console.log( $( "select option:selected" ).index() ); // or $( "#select-theme option:selected" )
                var $t_css_link = "<?php echo base_url();?>assets/grocery_crud/texteditor/ckeditor/plugins/codesnippet/lib/highlight/styles/";
                $("head").children("[hj='highlight']").remove(); // http://stackoverflow.com/a/3896988
                $t_css_link += $(this).val() + ".css";
                $("head").append("<link rel='stylesheet' href="+ $t_css_link + " type='text/css' hj='highlight' media='screen' />");
            }).change();
            
            $("code").on('dblclick', function(e) {
                e.preventDefault();
                $(this).parent().selText().addClass("selected");
            });
            
            var toggleStrip = function(boo){
                var arr = $("pre").html().split('\n'); // $('pre').html().match(/\n/) or $('pre').html().split(/\n/).length http://stackoverflow.com/a/5545531
                for (var i = 0; i < arr.length; i++){
                    if (i % 2 == 1){
                        var replace = '<span class="line-alt1">' + arr[i] + '</span>';
                        if (boo)
                            $("code").html(function () {
                                return $(this).html().replace(arr[i], replace);
                                // return $(this).wrapInner('<span class="line-alt1"></span>');
                            });
                        else    $('.line-alt1').contents().unwrap();
                    }
                }
            };
            setTimeout(function() {
                hljs.initHighlightingOnLoad();
                console.log($("table").width());
                // $("#select-theme option:eq(20)").prop('selected', true);
            }, 1000);
            // $("table").css({"table-layout":"fixed"}); // "max-width": "500px", "width": "500px"
            $('input:checkbox').on('change', function(){
                toggleStrip($(this).is(":checked"));
            });
        });
    </script>
</head>
<body>
<div class="wrapper container">
<div>
<select id="select-theme" class="typeahead">
    <option value="monokai_sublime">monokai_sublime</option>
    <option value="default">default</option>
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
    <option value="googlecode" selected="selected">googlecode</option>
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
</select> <label>     Striped Background<input type="checkbox" name="checkbox" value="value"></label>
</div>
<?php
	$query = $this->db->query('SELECT thread, subject, content FROM sample_table');
	echo "<div class='row'><table class='table table-lay-out table-bordered table-condensed table-striped' id='displayCSS'><tr><th class='col-md-1'>Thread</th><th class='col-md-2'>Subject</th><th class='col-md-8' id='td-content'>Content</th></tr>";
	if ($query->num_rows()){
		$t_id = 0;
		foreach ($query->result() as $row){
			$t_id++;
			$t_class = (($t_id % 2)==0) ? 'alt': '';
			
			echo "<tr class=". $t_class ."><td>" . $row->thread . "</td>
			          <td>" . $row->subject . "</td>
			          <td id='td-content'><span>" . $row->content . "</span></td></tr>";
		}
	}
	echo "</table></div>";

	/*$jsonString = json_encode($t_result_arr, JSON_PRETTY_PRINT);
	echo $jsonString . "<br/><br/>";*/
	
?>
</div>
</body>
</html>